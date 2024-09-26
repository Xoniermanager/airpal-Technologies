<?php

namespace App\Http\Services;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\DayOfWeek;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\DoctorAppointmentConfigRepository;
use App\Http\Repositories\AppointmentConfigExceptionDayRepository;

class DoctorAppointmentConfigService
{
    private  $doctorAppointmentConfigRepository;
    private $appointmentConfigExceptionDayRepository;

    private $bookingServices;

    public function __construct(DoctorAppointmentConfigRepository $doctorAppointmentConfigRepository,
    AppointmentConfigExceptionDayRepository $appointmentConfigExceptionDayRepository, BookingServices $bookingServices)
    {
        $this->doctorAppointmentConfigRepository = $doctorAppointmentConfigRepository;
        $this->appointmentConfigExceptionDayRepository = $appointmentConfigExceptionDayRepository;
        $this->bookingServices = $bookingServices;
    }

    public function addDoctorAppointmentConfig($data)
    {
        DB::beginTransaction();
        try {
            $payload = $this->createAppointmentConfigPayload($data);
            $appointmentConfigDetails = $this->doctorAppointmentConfigRepository->create($payload);

            if (isset($data['exception_day_ids']))
            {
                foreach ($data['exception_day_ids'] as $exception_day_id)
                {
                    $exceptionData = [
                        "doctor_appointment_config_id" => $appointmentConfigDetails->id,
                        "exception_days_id" => $exception_day_id,
                    ];
                    $this->appointmentConfigExceptionDayRepository->create($exceptionData);
                }
            }
            DB::commit();
            return $appointmentConfigDetails;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getSlotsPaginated()
    {
        return $this->doctorAppointmentConfigRepository->with(['user', 'doctorExceptionDays'])->paginate(10);
    }

    public function getDoctorActiveAppointmentConfigDetails($doctorId)
    {
        return $this->doctorAppointmentConfigRepository
            ->where('user_id', $doctorId)
            ->where('status', 1)
            ->orWhere(function($query){
                return $query
                    ->whereNotNull('config_end_date')
                    ->where('config_end_date','>=',now());
            })->with(['user', 'doctorExceptionDays'])->orderBy('config_start_date','asc')->first();
    }
    public function getSlotsBySlotId($id)
    {
        return $this->doctorAppointmentConfigRepository->where('user_id', $id)->with(['user', 'doctorExceptionDays'])->first();
    }

    public function deleteSlot($id,$currentConfigId)
    {
        $data = $this->doctorAppointmentConfigRepository->find($id);
        if($data)
        {
            $this->appointmentConfigExceptionDayRepository->where('doctor_appointment_config_id', $id)->delete();
            $response = $data->delete();
        }
        if($response)
        {
            $this->doctorAppointmentConfigRepository->find($currentConfigId)->update(['config_end_date' => null]);
        }
        return $response;
    }
    public function updateSlot($data, $currentAppointmentConfigDetails)
    {
        DB::beginTransaction();
        /**
         * First of all lets check if this request is for updating the current appointment config OR
         * To add end date for current config and create a new appointment config details
         */
        // If current appointment config end date is set then create another appointment config for future
        if(isset($data['appointment_config_end_date']) && !empty($data['appointment_config_end_date']))
        {
            $endDateForCurrentAppointmentConfig = $data['appointment_config_end_date'];
            $startDateForNewAppointmentConfig = date('Y-m-d', strtotime($data['appointment_config_end_date'] . ' +1 day'));
            // Check how many active appointment configurations exists
            $existingAppointmentConfigs = $this->getAllActiveAppointmentConfigsForDoctor($data['doctor_id']);
            $appointmentConfigCounter = $existingAppointmentConfigs->count();
            // If counter is 1 it means there is only one appointment config details,
            // So lets set its end date and create a new appointment
            $newAppointmentConfigDetails = [];
            if($appointmentConfigCounter == 1)
            {
                // set end date for current appointment config
                $currentAppointmentConfigDetails->update([
                    'config_end_date' => $endDateForCurrentAppointmentConfig
                ]);

                // Create a new appointment config with  future start date
                $data['config_start_date'] = $startDateForNewAppointmentConfig;
                $newAppointmentConfigDetails = $this->addDoctorAppointmentConfig($data);
            }

            if($appointmentConfigCounter == 2)
            {
                $newAppointmentConfigDetails = $this->updateExistingAppointmentConfigDetails($existingAppointmentConfigs[1], $data);
            }

            DB::commit();

            return [
                'status'    => true,
                'data'      =>  $newAppointmentConfigDetails,
                'message'   =>  'Old appointment config end date is set to '. $endDateForCurrentAppointmentConfig .' and new appointment config start date set to ' . $startDateForNewAppointmentConfig
            ];
        }


        $message = '';
        try {

            $payload = $this->createAppointmentConfigPayload($data);
;
            if ($currentAppointmentConfigDetails)
            {
                // Step1 : Check if there is any change in slot duration and cleanup interval time
                // dd($currentAppointmentConfigDetails->slot_duration, $data['slot_duration'], $currentAppointmentConfigDetails->cleanup_interval, $data['cleanup_interval']);
                if($currentAppointmentConfigDetails->slot_duration !=  $data['slot_duration'] || $currentAppointmentConfigDetails->cleanup_interval !=  $data['cleanup_interval'])
                {
                    $message = $this->checkIfBookingExistsSetNewConfigStartDate($data['doctor_id']);
                }

                // Step2 : Compare if there is any exception days added in update
                $currentExceptionDays = $this->appointmentConfigExceptionDayRepository->where('doctor_appointment_config_id', $currentAppointmentConfigDetails->id)->pluck('exception_days_id')->toArray();
                $updatedExceptionDays = isset($data['exception_day_ids']) ? $data['exception_day_ids'] : [];

                // Check if there is any new exception days has been added, which does not exists already in list
                $exceptionDaysDifference = array_diff($updatedExceptionDays, $currentExceptionDays);
                if(count($exceptionDaysDifference) > 0)
                {
                    $message = $this->checkIfBookingExistsSetNewConfigStartDate($data['doctor_id']);
                }

                // Step3: Checking if slot starting day of each month has been increased from current start date
                // OR checking if slot ending day of each month has been decreased from current end date
                if($currentAppointmentConfigDetails->start_month <  $data['start_month'] || $currentAppointmentConfigDetails->end_month >  $data['end_month'])
                {
                    $message = $this->checkIfBookingExistsSetNewConfigStartDate($data['doctor_id']);
                }
                if(!empty($message))
                {
                    return [
                        'status'    => false,
                        'data'      =>  $message['lastBookingDate'],
                        'message'   =>  $message['message']
                    ];
                }
                else
                {
                    $updatedAppointmentConfigDetails = $this->doctorAppointmentConfigRepository->find($currentAppointmentConfigDetails->id)->update($payload);
                    DB::commit();
                    // Write additional script to remove existing exception days if required
                    return [
                        'status'    =>  true,
                        'data'      =>  $updatedAppointmentConfigDetails,
                        'message'   =>  'Slot Config details updated successfully!'
                    ];
                }
            }
            else
            {
                // Create a new slot
                $message = $this->addDoctorAppointmentConfig($data);
            }

            DB::commit();

            return [
                'status'    => false,
                'message'   =>  $message
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    // Compare if any future date active booking exists then, set a new date to apply new changes
    public function checkIfBookingExistsSetNewConfigStartDate($doctorId)
    {
        // check if there is already any existing slot booking with status requested, confirmed
        $activeBooking = $this->bookingServices->getDoctorActiveBookingSlots($doctorId);
        if($activeBooking->count() > 0)
        {
            $lastBookingDate = date('jS M Y', strtotime($activeBooking[0]->booking_date)) .  ' - ' .
            date('h:i A', strtotime($activeBooking[0]->slot_start_time));

            $newConfigStartDate = date('jS M Y', strtotime($activeBooking[0]->booking_date . ' +1 day'));

            return [
                'lastBookingDate'     =>  $activeBooking[0]->booking_date,
                'message'             =>  "We have found some active bookings based on current slot configuration having last booking date on {$lastBookingDate},
            So new configuration changes will be applicable from {$newConfigStartDate}."
            ];
        }
        return 0;
    }

    public function createDoctorSlots($doctorSlotConfigDetails)
    {
        $startDate = date_create($doctorSlotConfigDetails->start_slots_from_date);
        $endDate = today();
        date_modify($endDate, '+' . $doctorSlotConfigDetails->slots_in_advance . ' days');

        $formattedStartDate = date_create(date_format($startDate, 'Y-m-d'));
        $formattedEndDate   = date_create(date_format($endDate, 'Y-m-d'));
        $interval = new DateInterval('P1D');

        //Step 2 :Getting exception days name and making an array so that we will pass in_array function and if exist
        $exceptionDaysName = [];
        if (isset($doctorSlotConfigDetails->doctorExceptionDays)) {
            $exceptionDays = $doctorSlotConfigDetails->doctorExceptionDays->toArray();
            if (count($exceptionDays) > 0) {
                foreach ($exceptionDays as $exceptionDay) {
                    $exceptionDaysName[] =  DayOfWeek::find($exceptionDay['exception_days_id'])->name;
                }
            }
        }

        //Step 3 : Getting date range between start slot date from and advance date (future date)
        $date_range = new DatePeriod($formattedStartDate, $interval, $formattedEndDate);

        $allDaySlots = [];

        foreach ($date_range as $date) {
            $dayName = $date->format('l');
            $dateFormatted = $date->format('Y-m-d');

            // Check if exception_days exist and are not empty, then skip that day of slot creation
            if (isset($exceptionDaysName) && count($exceptionDaysName) > 0) {
                if (in_array($dayName, $exceptionDaysName)) {
                    continue;
                }
            }

            // start date of month date modification integer to date the compare
            if (isset($doctorSlotConfigDetails->start_month)) {
                $dayNumber = $date->format('j');
                if ($dayNumber < $doctorSlotConfigDetails->start_month) {
                    continue;
                }
            }

            // end date of month date modification integer to date the compare
            if (isset($doctorSlotConfigDetails->end_month)) {
                $dayNumber = $date->format('j');
                if ($dayNumber > $doctorSlotConfigDetails->end_month) {
                    continue;
                }
            }

            // Checking if current date is greater than stop_slots_date exit the loop
            if (isset($doctorSlotConfigDetails->stop_slots_date)) {
                if ($dateFormatted >= $doctorSlotConfigDetails->stop_slots_date) {
                    break;
                }
            }

            //Step 4 : Applying condition inside day for slot creation with time and interval
            $start = new DateTime('09:00'); // statically set but later do it dynamic
            $end   = new DateTime('19:00');

            $meetingTime      = CarbonInterval::minutes($doctorSlotConfigDetails->slot_duration);
            $breakInterval = CarbonInterval::minutes($doctorSlotConfigDetails->cleanup_interval);



            // $interval = new DateInterval("PT" . $doctorSlotConfigDetails->slot_duration . "M");
            // $breakInterval = new DateInterval("PT" . $doctorSlotConfigDetails->cleanup_interval . "M");

            // $start = $start->format('H:i');
            // $end   = $end->format('H:i');

            $daySlots = []; // Array to hold slots for the current day

            // This for loop making slot for a day
            for ($startTime = $start; $startTime < $end; $startTime->add($meetingTime)->add($breakInterval)) {
                $endPeriod = clone $startTime;
                $endPeriod->add($meetingTime); // Here making end time with adding interval and continue with new value
                if ($endPeriod > $end) {
                    break;
                }

                $daySlots[] = $startTime->format('H:i') . ' - ' . $endPeriod->format('H:i');
            }

            $allDaySlots[$dateFormatted] = [
                'day' => $dayName,
                'slotsTime' => $daySlots
            ];
        }
        return $allDaySlots;
    }

    public function CreateDoctorSlotCalendar($doctorSlotConfigDetails, $month = '', $year = '')
    {
        $doctorId = $doctorSlotConfigDetails->user->id;
        $startDate = date_create($doctorSlotConfigDetails->start_slots_from_date);
        $endDate = clone $startDate;
        date_modify($endDate, '+' . $doctorSlotConfigDetails->slots_in_advance . ' days');
        // dd($doctorSlotConfigDetails);
        $formattedStartDate = Carbon::create($startDate, 'Y-m-d')->toDateString();
        $formattedEndDate = Carbon::create($endDate, 'Y-m-d')->toDateString();

        //Step 2 : Getting exception days name and making an array so that we will pass in_array function to check if exist
        $exception_days_name = [];
        if (isset($doctorSlotConfigDetails->doctorExceptionDays)) {
            $exceptionDays = $doctorSlotConfigDetails->doctorExceptionDays->toArray();
            if (count($exceptionDays) > 0) {
                foreach ($exceptionDays as $exceptionDay) {
                    $exception_days_name[] =  DayOfWeek::find($exceptionDay['exception_days_id'])->name;
                }
            }
        }

        // First of all, lets create an array containing the names of all days in a week
        $daysOfWeek = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');

        $month = (!empty($month)) ? (int)$month : (int)date('m'); // let
        $year  = (!empty($year)) ? (int)$year : (int)date('Y'); // let

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

        // Create the HTML table
        $calendar = "<div class='calendar'><table class='table table-bordered' id='appointment-request'>";

        $calendar .= "<div class='calen-header'>";
        // $calendar .= "<h3>$monthName $year</h3>";

        $previous_month = date('m', mktime(0, 0, 0, $month - 1, 1, $year));
        $previous_year = date('Y', mktime(0, 0, 0, $month - 1, 1, $year));
        $calendar .= "<button onclick='ajax_update_calendar($previous_month, $previous_year ,$doctorId )' class='btn bten-pre'><i class='fa fa-chevron-left'></i></button>";

        $current_month = date('m');
        $current_year = date('Y');
        $calendar .= "<button onclick='ajax_update_calendar($current_month, $current_year ,$doctorId )' class='btn btn-cur'> $monthName $year </button>";

        $next_month = date('m', mktime(0, 0, 0, $month + 1, 1, $year));
        $next_year = date('Y', mktime(0, 0, 0, $month + 1, 1, $year));
        $calendar .= "<button onclick='ajax_update_calendar($next_month, $next_year ,$doctorId )' class='btn btn-nex'><i class='fa fa-chevron-right'></i></button>";

        $calendar .= "</div>";

        $calendar .= "<tr style='background-color:#F2F2F2;'>";

        // Create the calendar headers
        foreach ($daysOfWeek as $day) {
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
                // 1. if current date is less than create slot start date
                // 2. if current date is pass date
                // 3. if current date is greater than create slot end date
                if ($date >= $formattedStartDate && $date <= $formattedEndDate) {
                    $calendar .= "<td><button class='$is_today btn not-btn'><h4>$current_day</h4> <span class='na'></span></button></td>";
                } else {
                    $calendar .= "<td class='$is_today date'><h4>$current_day</h4></td>";
                }
            } elseif (in_array($dayName, $exception_days_name)) {
                $calendar .= "<td><button class='$is_today btn notAvail'><h4>$current_day</h4></button></td>";
            } else {
                $calendar .= "<td class='$is_today date '><button onclick='checkSlotsByDate(\"$date\", $doctorId)' type='button' class='btn avail-btn' selected_date='$date'><h4>$current_day</h4></button></td>";
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
        return $calendar;
    }
    public function getSlotConfig($doctorId)
    {
        return $this->doctorAppointmentConfigRepository->where('user_id', $doctorId)->first();
    }

    // Lets discuss where e are using it
    public function createSlot($data)
    {
        DB::beginTransaction();
        $now = Carbon::now();
        try {
            $payload = $this->createAppointmentConfigPayload($data);

            $appointmentConfigDetails = $this->doctorAppointmentConfigRepository->create($payload);

            if (isset($data['exception_day_ids'])) {
                foreach ($data['exception_day_ids'] as $exception_day_id)
                {
                    $exceptionData = [
                        "doctor_appointment_config_id" => $appointmentConfigDetails->id,
                        "exception_days_id" => $exception_day_id,
                    ];
                    $this->appointmentConfigExceptionDayRepository->updateOrCreate($exceptionData);
                }
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * It will return all active appointment config details for provided doctor id
     */
    public function getAllActiveAppointmentConfigsForDoctor($doctorId)
    {
        return $this->doctorAppointmentConfigRepository
        ->where(function($query){
            return $query->whereNotNull('config_end_date')
            ->where('config_end_date','>=',now());
        })
        ->orWhereNull('config_end_date')
        ->where('user_id',$doctorId)
        ->where('status', 1)
        ->where('status',true)->orderBy('config_start_date','asc')->get();
    }

    /**
     * It will return all active,upcoming and expired appointment config details for provided doctor id
     */
    public function getAllActiveExpiredAppointmentConfigsForDoctor($doctorId)
    {
        return $this->doctorAppointmentConfigRepository->with('doctorExceptionDays')->where('user_id','=',$doctorId)->orderBy('config_start_date','desc')->get();
    }

    /**
     * It update the appointment config details for current record and then also updates the exception days list
     */
    public function updateExistingAppointmentConfigDetails($existingAppointmentConfig, $payload)
    {
        $appointmentConfigPayload = $this->createAppointmentConfigPayload($payload);
        $this->doctorAppointmentConfigRepository->find($existingAppointmentConfig->id)->update($payload);
        // Now update existing days data
        if (isset($payload['exception_day_ids']))
        {
            // If exception days data exists in payload first of all remove existing exception days
            // Then after add all new exception days ids
            $this->appointmentConfigExceptionDayRepository->where('doctor_appointment_config_id',$existingAppointmentConfig->id)->delete();
            foreach ($payload['exception_day_ids'] as $exception_day_id)
            {
                $exceptionPayload = [
                    "doctor_appointment_config_id" => $existingAppointmentConfig->id,
                    "exception_days_id" => $exception_day_id,
                ];

                $this->appointmentConfigExceptionDayRepository->create($exceptionPayload);
            }
        }
    }

    /**
     * Create a payload for appointment config details that can be used for create/update appointment config details
     */
    public function createAppointmentConfigPayload($data)
    {
        return [
            "user_id"               => $data['doctor_id'],
            "slot_duration"         => $data['slot_duration'],
            "cleanup_interval"      => $data['cleanup_interval'],
            "start_month"           => isset($data['start_month']) ? $data['start_month'] : Carbon::now()->startOfMonth()->format('d'),
            "end_month"             =>  isset($data['end_month']) ? $data['end_month'] : null,
            "slots_in_advance"      => $data['slots_in_advance'] ? $data['slots_in_advance'] : 30,
            "start_slots_from_date" => isset($data['start_slots_from_date']) ? $data['start_slots_from_date'] : Carbon::today()->toDateString(),
            "stop_slots_date"       => isset($data['stop_slots_date']) ? $data['stop_slots_date'] : null,
            "config_start_date"     => isset($data['config_start_date']) ? $data['config_start_date'] : Carbon::today()->toDateString(),
            "status"                => 1
        ];
    }
}
