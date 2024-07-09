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
            
        }

        return $allDaySlots;
}

public function showCalendar($data)
{
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
		// First of all, lets create an array containing the names of all days in a week
		$days_of_week = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');

        $month = 7; // let  
        $year  = 2024; // let 

        // Create a Carbon instance for the first day of the month
        $firstDayOfMonth = Carbon::create($year, $month, 1, 0, 0, 0);

		// Now getting the number of days this month contains
        $number_of_days = Carbon::now()->month($month)->daysInMonth;

        // Get the name of the month
        $monthName = $firstDayOfMonth->format('F');  // e.g., "July"

        // Get the index value (0-6) of the first day of the month
        $dayOfWeek = $firstDayOfMonth->dayOfWeek;  


		// Getting some information about the first day of this month
        $dateToday = Carbon::now()->toDateString();  // e.g., "2024-07-03"

        
		// // Getting the name of thjis month
		// $month_name = $date_components['month'];

		// // Getting the index values 0-6 of the first day of this month
		// $day_of_week = $date_components['wday'];

		// // Getting the current date
		// $date_today = date('Y-m-d');



        // Now creating the html table
		$calendar = "<div class='calen-table'><table class='table table-bordered' id='appointment-request'>";

		$calendar .= "<div class='calen-header'>";
		$calendar .= "<h2>$monthName $year</h2>";

		$previous_month = date('m',mktime(0,0,0,$month-1,1,$year));
		$previous_year = date('Y',mktime(0,0,0,$month-1,1,$year));
		$calendar .= "<button onclick='ajax_update_calendar({$previous_month},{$previous_year})' class='btn bten-pre'>Previous Month</button>";

		$current_month = date('m');
		$current_year = date('Y');
		$calendar .= "<button onclick='ajax_update_calendar({$current_month},$current_year)' class='btn btn-cur'>Current Month</button>";

		$next_month = date('m',mktime(0,0,0,$month+1,1,$year));
		$next_year = date('Y',mktime(0,0,0,$month+1,1,$year));
		$calendar .= "<button onclick='ajax_update_calendar({$next_month},{$next_year})' class='btn btn-nex'>Next Month</button>";

		$calendar .= "</div>";

		$calendar .= "<tr>";

		// NOw creating the calendar headers
		foreach($days_of_week as $day)
		{
			$calendar .= "<th class='header'>$day</th>";
		}

		// Initiating the day counter
		$current_day = 1;
		$calendar .= "</tr><tr>";

		// The variable $days_of_week will make sure that there must be only 7 columns in our table
		if($days_of_week > 0)
		{
			for($k = 0; $k < $days_of_week; $k++)
			{
                // dd($k);
				 $calendar .= "<td class='empty'></td>";
			}
		}

		// Getting the month number
		$month = str_pad($month,2,"0",STR_PAD_LEFT);

		while($current_day <= $number_of_days)
		{
			if($days_of_week == 7)
			{
				$days_of_week = 0;
				$calendar .= "</tr><tr>";
			}

			$current_day_rel =  str_pad($current_day,2,"0",STR_PAD_LEFT);
			$date = "$year-$month-$current_day_rel";
			$day_name = strtolower(date('l',strtotime($date)));
			$event_num = 0;
			$today_date = date('Y-m-d');
			$is_today = ($date == $today_date) ? "today" : "";
			// $calendar .= "<td>";
			// $calendar .= "<h4>$current_day</h4>";
			// $calendar .= "</td>";

			if($date < $startDate || $date < $today_date || $date > $endDate)
			{
				if($date >= $startDate && $date <= $endDate)
				{
					$calendar .= "<td><button class='btn not-btn'><h4>$current_day</h4> <span class='na'>N/A</span></button></td>";
				}
				else
				{
					$calendar .= "<td><h4>$current_day</h4></td>";
				}
			}
			elseif(in_array($date,array_column(['2/7/2024'],'booking_date')))
			{
				// Searcing the current date in array $bookings under column name booking_date
				$calendar .= "<td><button class='btn not-btn'><h4>$current_day</h4> Already Booked</button></td>";
			}
			else
			{
				// $calendar .= "<td class='$is_today'><button onclick='check_available_slot(this,\"".$slot_div_id."\")' type='button' class='btn avail-btn' selected_date=".$date."><h4>$current_day</h4><span class='av'>Availability</span></button></td>";
			}
			
			$current_day++;
			$days_of_week++;
		}

		// Completing the row of the last week in month, if necessary
		if($days_of_week != 7)
		{
			$remaining_days = 7 - $days_of_week;

			for($i=0; $i<$remaining_days; $i++)
			{
				$calendar .= "<td></td>";
			}
		}

		$calendar .= "</tr>";
		$calendar .= "</table></div>";
		return $calendar;



}




}