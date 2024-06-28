<?php

namespace App\Http\Services;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\DayOfWeek;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Repositories\DoctorSlotRepository;
use App\Http\Repositories\DoctorExceptionDayRepository;

class DoctorSlotServices
{
    private  $doctorSlotRepository;
    private $userServices;
    private $doctorExceptionDayRepository;

    public function __construct(DoctorSlotRepository $doctorSlotRepository, DoctorExceptionDayRepository $doctorExceptionDayRepository, UserServices $userServices)
    {
        $this->doctorSlotRepository = $doctorSlotRepository;
        $this->doctorExceptionDayRepository = $doctorExceptionDayRepository;
        $this->userServices = $userServices;
    }

    public function addSlot($data)
    {

        // Start a transaction
        DB::beginTransaction();
        try {
            $payload = [
                "user_id"   => $data['doctor_id'],
                "slot_duration" => $data['slot_duration'],
                "cleanup_interval" => $data['cleanup_interval'],
                "start_month" => isset($data['start_month']) ? $data['start_month'] : Carbon::now()->startOfMonth()->format('d'),
                "end_month" =>  isset($data['end_month']) ? $data['end_month'] : null,
                "slots_in_advance" => $data['slots_in_advance']? $data['slots_in_advance']:30,
                "start_slots_from_date" => isset($data['start_slots_from_date']) ? $data['start_slots_from_date'] : Carbon::today()->toDateString(),
                "stop_slots_date" => $data['stop_slots_date']
            ];
            $this->doctorSlotRepository->create($payload);

            if (isset($data['exception_day_ids'])) {
                foreach ($data['exception_day_ids'] as $exception_day_id) {
                    $exceptionData = [
                        "doctor_id" => $data['doctor_id'],
                        "exception_days_id" => $exception_day_id,
                    ];
                    $this->doctorExceptionDayRepository->create($exceptionData);
                }
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function getSlotsPaginated()
    {
        return $this->doctorSlotRepository->with(['user', 'doctorExceptionDays'])->paginate(10);
    }
    public function getSlotsByDoctorId($doctorId)
    {
        return $this->doctorSlotRepository->where('user_id', $doctorId)->with(['user', 'doctorExceptionDays'])->first();
    }

    public function deleteSlot($id)
    {
        $this->doctorSlotRepository->delete($id);
        $this->doctorExceptionDayRepository->where('doctor_id', $id)->delete();
        return true;
    }
    public function updateSlot($data)
    {
        DB::beginTransaction();
        $now = Carbon::now();
        try {
            $payload = [
                "user_id"   => $data['doctor_id'],
                "slot_duration" => $data['slot_duration'],
                "cleanup_interval" => $data['cleanup_interval'],
                "start_month" => isset($data['start_month']) ? $data['start_month'] : $now->startOfMonth()->format('d'),
                "end_month" =>  isset($data['end_month']) ? $data['end_month'] : null,
                "slots_in_advance" => $data['slots_in_advance']? $data['slots_in_advance']:30,
                "start_slots_from_date" => isset($data['start_slots_from_date']) ? $data['start_slots_from_date'] : Carbon::today()->toDateString(),
                "stop_slots_date" => $data['stop_slots_date']
            ];

            $existingSlot = $this->doctorSlotRepository->where('user_id', $data['doctor_id'])->first();
            if ($existingSlot) {
                $this->doctorSlotRepository->where('user_id', $existingSlot->user_id)->update($payload);
            } else {

                throw new \Exception('Doctor slot not found for update.');
            }

            if (isset($data['exception_day_ids'])) {

                $currentExceptionDays =  $this->doctorExceptionDayRepository->where('doctor_id', $data['doctor_id'])->pluck('exception_days_id')->toArray();
                $exceptionDayToRemove   = array_diff($currentExceptionDays, $data['exception_day_ids']);
                if (!empty($exceptionDayToRemove)) {
                    $this->doctorExceptionDayRepository->where('doctor_id', $data['doctor_id'])
                        ->whereIn('exception_days_id', $exceptionDayToRemove)
                        ->delete();
                }

                foreach ($data['exception_day_ids'] as $exception_day_id) {
                    $exceptionData = [
                        "doctor_id" => $data['doctor_id'],
                        "exception_days_id" => $exception_day_id,
                    ];
                    $this->doctorExceptionDayRepository->updateOrCreate(
                        ['doctor_id' => $data['doctor_id'], 'exception_days_id' => $exception_day_id],
                        $exceptionData
                    );
                }
            } else {
                $this->doctorExceptionDayRepository->where('doctor_id', $data['doctor_id'])->delete();
            }


            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function makeSlots($data)
    {
    
    $currentDate = Carbon::today()->toDateString();



    //Step 1:  Here we are verifying that the selected start date is in the past.
    if ($currentDate <= $data->start_slots_from_date) {

        $startDate = date_create($data->start_slots_from_date);
        $endDate = clone $startDate;
        date_modify($endDate, '+'.$data->slots_in_advance.' days');

        $formattedStartDate = date_create(date_format($startDate, 'Y-m-d'));
        $formattedEndDate   = date_create(date_format($endDate, 'Y-m-d'));
        $interval = new DateInterval('P1D');

        //Step 2 :Getting exception days name and making an array so that we will pass in_array function and if exist
        if (isset($data->exception_days) && !empty($data->exception_days->toArray())) {
            foreach ($data->exception_days as $exception_day) {
                $exception_days_name[] =  DayOfWeek::find($exception_day->exception_days_id)->name;

            }
        }

        //Step 3 : Getting date range between start slot date from and advance date (future date)
        $date_range = new DatePeriod($formattedStartDate, $interval, $formattedEndDate);
        $allDaySlots = [];



        foreach ($date_range as $date) {
            $dayName = $date->format('l');
            $dateFormatted = $date->format('Y-m-d');

            // Check if exception_days exist and are not empty, then skip that day of slot creation
            if (isset($data->exception_days) && !empty($data->exception_days->toArray())) {
                if (in_array($dayName, $exception_days_name)) {
                    continue;
                }
            }

            // start date of month date modification integer to date the compare
            if(isset($data->start_month))
            {
                $dayNumber = $date->format('j');
                if($dayNumber < $data->start_month)
                {
                    continue;
                }
            }

             // end date of month date modification integer to date the compare
             if(isset($data->end_month))
             {
                 $dayNumber = $date->format('j');
                 if($dayNumber > $data->end_month)
                 {
                     continue;
                 }
             }

            // Checking if current date is greater than stop_slots_date exit the loop
            if (isset($data->stop_slots_date)) {
                if ($dateFormatted >= $data->stop_slots_date) {
                    break;
                }
            }

            //Step 4 : Applying condition inside day for slot creation with time and interval
            $start = new DateTime('09:00'); // statically set but later do it dynamic
            $end   = new DateTime('19:00');
            $interval = new DateInterval("PT" . $data->slot_duration . "M");
            $breakInterval = new DateInterval("PT" . $data->cleanup_interval . "M");

            $daySlots = []; // Array to hold slots for the current day

            // This for loop making slot for a day 
            for ($startTime = $start; $startTime < $end; $startTime->add($interval)->add($breakInterval)) {
                $endPeriod = clone $startTime;
                $endPeriod->add($interval); // Here making end time with adding interval and continue with new value
                if ($endPeriod > $end) {
                    $endPeriod = $end;
                }

                $daySlots[] = $startTime->format('H:iA') . ' - ' . $endPeriod->format('H:iA');
            }

            $allDaySlots[$dateFormatted] = [
                'day' => $dayName,
                'slotsTime' => $daySlots
            ];
            // Adding the day's slots to the allDaySlots array
            // $allDaySlots[$date->format('Y-m-d')] = $daySlots;

            //  $allDaySlots[$dayName] = $daySlots;
           //  $allDaySlots[] = $daySlots;
            
        }

        return $allDaySlots;
    }
}
}


