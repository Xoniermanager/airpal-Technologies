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

    private $bookingServices;

    public function __construct(DoctorSlotRepository $doctorSlotRepository, DoctorExceptionDayRepository $doctorExceptionDayRepository, UserServices $userServices ,BookingServices $bookingServices)
    {
        $this->doctorSlotRepository = $doctorSlotRepository;
        $this->doctorExceptionDayRepository = $doctorExceptionDayRepository;
        $this->userServices = $userServices;
        $this->bookingServices = $bookingServices;
    }

    public function addSlot($data)
    {
        DB::beginTransaction();
        try {
            $payload = [
                "user_id"   => $data['doctor_id'],
                "slot_duration" => $data['slot_duration'],
                "cleanup_interval" => $data['cleanup_interval'],
                "start_month" => isset($data['start_month']) ? $data['start_month'] : Carbon::now()->startOfMonth()->format('d'),
                "end_month" =>  isset($data['end_month']) ? $data['end_month'] : null,
                "slots_in_advance" => $data['slots_in_advance'] ? $data['slots_in_advance'] : 30,
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
                "slots_in_advance" => $data['slots_in_advance'] ? $data['slots_in_advance'] : 30,
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

        $startDate = date_create($data->start_slots_from_date);
        $endDate = clone $startDate;
        date_modify($endDate, '+' . $data->slots_in_advance . ' days');

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
            if (isset($data->start_month)) {
                $dayNumber = $date->format('j');
                if ($dayNumber < $data->start_month) {
                    continue;
                }
            }

            // end date of month date modification integer to date the compare
            if (isset($data->end_month)) {
                $dayNumber = $date->format('j');
                if ($dayNumber > $data->end_month) {
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
        }

        return $allDaySlots;
    }

    public function showCalendar($data, $month = '',$year = '')
    {
        $doctor_id = $data->id;
        $startDate = date_create($data->start_slots_from_date);
        $endDate = clone $startDate;
        date_modify($endDate, '+' . $data->slots_in_advance . ' days');

        // $formattedStartDate = date_create(date_format($startDate, 'Y-m-d'));
        $formattedStartDate = Carbon::create($startDate, 'Y-m-d')->toDateString();
        $formattedEndDate = Carbon::create($endDate, 'Y-m-d')->toDateString();

        // $interval = new DateInterval('P1D');

        //Step 2 :Getting exception days name and making an array so that we will pass in_array function and if exist
        if (isset($data->exception_days) && !empty($data->exception_days->toArray())) {
            foreach ($data->exception_days as $exception_day) {
                $exception_days_name[] =  DayOfWeek::find($exception_day->exception_days_id)->name;
            }
        }

        // First of all, lets create an array containing the names of all days in a week
        $days_of_week = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');

        // dd
        $month = (!empty($month)) ? (int)$month : 7; // let  
        $year  = (!empty($year)) ? (int)$year : 2024; // let  

        // dd($month,$year);
        // Create a Carbon instance for the first day of the month
        $firstDayOfMonth = Carbon::create($year, $month, 1, 0, 0, 0);

        // Now getting the number of days this month contains
        $number_of_days = Carbon::now()->month($month)->daysInMonth;
        // dd(        $firstDayOfMonth );
        // Get the name of the month
        $monthName = $firstDayOfMonth->format('F');  // e.g., "July"

        // Get the index value (0-6) of the first day of the month
        $dayOfWeek = $firstDayOfMonth->dayOfWeek;


        // Getting some information about the first day of this month
        $dateToday = Carbon::now()->toDateString();  // e.g., "2024-07-03"

        // Create the HTML table
        $calendar = "<div class='calendar'><table class='table table-bordered' id='appointment-request'>";

        $calendar .= "<div class='calen-header'>";
        // $calendar .= "<h3>$monthName $year</h3>";

        $previous_month = date('m', mktime(0, 0, 0, $month - 1, 1, $year));
        $previous_year = date('Y', mktime(0, 0, 0, $month - 1, 1, $year));
        $calendar .= "<button onclick='ajax_update_calendar($previous_month, $previous_year ,$doctor_id )' class='btn bten-pre'><i class='fa fa-chevron-left'></i></button>";

        $current_month = date('m');
        $current_year = date('Y');
        $calendar .= "<button onclick='ajax_update_calendar($current_month, $current_year ,$doctor_id )' class='btn btn-cur'> $monthName $year </button>";

        $next_month = date('m', mktime(0, 0, 0, $month + 1, 1, $year));
        $next_year = date('Y', mktime(0, 0, 0, $month + 1, 1, $year));
        $calendar .= "<button onclick='ajax_update_calendar($next_month, $next_year ,$doctor_id )' class='btn btn-nex'><i class='fa fa-chevron-right'></i></button>";

        $calendar .= "</div>";

        $calendar .= "<tr style='background-color:#F2F2F2;'>";

        // Create the calendar headers
        foreach ($days_of_week as $day) {
            $calendar .= "<th>$day</th>";
        }

        $calendar .= "</tr><tr>";

        // Initialize day counter
        $current_day = 1;

        // Calculate the number of empty cells before the first day of the month
        $start_day_of_week = date('w', strtotime("$year-$month-01"));
        for ($k = 0; $k < $start_day_of_week; $k++) {
            $calendar .= "<td class='empty'></td>";
        }

        $month = str_pad($month, 2, "0", STR_PAD_LEFT);


        while ($current_day <= $number_of_days) {
            if ($start_day_of_week == 7) {
                $start_day_of_week = 0;
                $calendar .= "</tr><tr>";
            }
        
            $current_day_rel = str_pad($current_day, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$current_day_rel";
        
            $today_date = date('Y-m-d');

            $is_today = ($date == $today_date) ? "today" : "";
        
            $dayName = Carbon::parse($date)->format('l');
        
            if ($date < $formattedStartDate || $date < $today_date || $date > $formattedEndDate) {
                if ($date >= $formattedStartDate && $date <= $formattedEndDate) {
                    $calendar .= "<td><button class='$is_today btn not-btn'><h4>$current_day</h4> <span class='na'></span></button></td>";
                } else {
                    $calendar .= "<td class='$is_today date'><h4>$current_day</h4></td>";
                }
            } elseif (in_array($date, ['2024-07-24'])) { // for not available days
                $calendar .= "<td><button class='$is_today btn not-btn'><h4>$current_day</h4></button></td>";
            } elseif (in_array($dayName, $exception_days_name)) { // for exception days 
                $calendar .= "<td><button class='$is_today btn notAvail'><h4>$current_day</h4></button></td>";
            } else {
                $data = ['doctor_id' => $doctor_id,'date' => $date];
                // dd(  $data );
                $gettingBookedSlots = $this->bookingServices->slotDetails($data)->get();
        
                // dd(count($gettingBookedSlots));
                $counter = count($gettingBookedSlots);

              
                $class = '';

                if($counter >= 7)
                {
                    $class = "halfFull";
                }
                elseif($counter == 12  )
                {
                    $class = "full";
                }


                $calendar .= "<td class='$is_today date $class'><button onclick='checkSlotsByDate(\"$date\", $doctor_id)' type='button' class='btn avail-btn' selected_date='$date'><h4>$current_day</h4></button></td>";

                // $calendar .= "<td class='$is_today date'><button onclick='checkSlotsByDate($date,$doctor_id)' type='button' class='btn avail-btn' selected_date='$date'><h4>$current_day</h4></button></td>";
            }
        
            $current_day++;
            $start_day_of_week++;
        }
        
        // Complete the row of the last week in month, if necessary
        if ($start_day_of_week != 7) {
            $remaining_days = 7 - $start_day_of_week;
            for ($i = 0; $i < $remaining_days; $i++) {
                $calendar .= "<td></td>";
            }
        }

        $calendar .= "</tr>";
        $calendar .= "</table></div>";
// dd($calendar);
        return $calendar;
    }

}
