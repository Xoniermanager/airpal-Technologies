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
use App\Models\BookingSlots;

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
                    // Write additional script to remove existing exception days if required

                    // Load current appointment config record to update relationship data
                    $updatedAppointmentConfigDetails = $this->doctorAppointmentConfigRepository
                    ->find($currentAppointmentConfigDetails->id);

                    if (isset($updatedAppointmentConfigDetails))
                    {
                        // Remove all existing non-availability dates
                        // AppointmentNonAvailabilityDates::where('doctor_appt_config_id', $currentAppointmentConfigDetails->id)->delete();

                        // foreach ($data['non_availability_dates'] as $date) {
                        //     AppointmentNonAvailabilityDates::create([
                        //         'doctor_appt_config_id' => $currentAppointmentConfigDetails->id,
                        //         'date' => $date,
                        //     ]);
                        // }
                        // Update exception days on which doctor is not available
                        $updatedAppointmentConfigDetails->doctorExceptionDays()->sync($data['exception_day_ids']);
                    }
                    DB::commit();
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
        // Called from api
        $startEndDate       = $this->getStartAndEndDateToCreateSlots($doctorSlotConfigDetails);
        $formattedStartDate = $startEndDate['formattedStartDate'];
        $formattedEndDate   = $startEndDate['formattedEndDate'];
        $exceptionDaysName  = $startEndDate['exception_days_name'];

        //Step 3 : Getting date range between start slot date from and advance date (future date)
        $interval   = new DateInterval('P1D');
        $date_range = new DatePeriod($formattedStartDate, $interval, $formattedEndDate);

        $allDaySlots = [];

        foreach ($date_range as $date)
        {
            $dayName = $date->format('l');
            $dateFormatted = $date->format('Y-m-d');
            
            // Here we are checking multiple conditions based on doctor provided configuration to confirm 
            // If slots will be created for current loop date or not ?
            $appointmentsForCurrentDate = $this->checkIfCurrentDateAvailableForBooking($dateFormatted, $exceptionDaysName, $doctorSlotConfigDetails);
            if(!$appointmentsForCurrentDate)
                continue;

            // Checking if current date is greater than stop_slots_date exit the loop
            if (isset($doctorSlotConfigDetails->stop_slots_date))
            {
                $slotEndDate = date_format(date_create($doctorSlotConfigDetails->stop_slots_date),'Y-m-d');
                if ($dateFormatted >= $slotEndDate) 
                {
                    break;
                }
            }

           $todaySlots = $this->getSelectedDateSlotsInArray($doctorSlotConfigDetails, $dateFormatted);

            $allDaySlots[$dateFormatted] = [
                'day'       => $dayName,
                'slotsTime' => $todaySlots
            ];
        }
        return $allDaySlots;
    }

    /**
     * Get selected date slots array.
     * This array can be used for web version as well as api version
     */
    public function getSelectedDateSlotsInArray($doctorSlotConfig, $currentDate)
    {
        $doctorId = $doctorSlotConfig->user_id;
         //Step 4 : Applying condition inside day for slot creation with time and interval
         $start = new DateTime('09:00'); // statically set but later do it dynamic
         $end   = new DateTime('19:00');
         $meetingTime   = CarbonInterval::minutes($doctorSlotConfig->slot_duration);
         $breakInterval = CarbonInterval::minutes($doctorSlotConfig->cleanup_interval);

         $daySlots = []; // Array to hold slots for the current day

         // This for loop making slot for a day
         for ($startTime = $start; $startTime < $end; $startTime->add($meetingTime)->add($breakInterval)) 
         {
             // If date is today, then skip the slots to show where time has been passed for the day
             if(date('Y-m-d') === $currentDate)
             {
                 if(now() > $startTime)
                 {
                    continue;
                 }
             }

             $endPeriod = clone $startTime;
             $endPeriod->add($meetingTime); // Here making end time with adding interval and continue with new value
             if ($endPeriod > $end) 
             {
                 break;
             }
             $slotStartTime = $startTime->format('H:i');
             $slotEndTime = $endPeriod->format('H:i');
            // Check if current slot is already booked
            $bookedStatus = BookingSlots::where('doctor_id',$doctorId)
                            ->where('slot_start_time',$slotStartTime)
                            ->where('slot_end_time',$slotEndTime)
                            ->whereDate('booking_date',$currentDate)
                            ->whereIn('status',['requested','confirmed'])
                            ->count();
            $booked = false;
            if($bookedStatus > 0)
            {
                $booked = true;
            }
            $currentSlot['slot'] = $slotStartTime . ' - ' . $slotEndTime;
            $currentSlot['booked_status'] = $booked;
            $daySlots[] = $currentSlot;
         }
        return $daySlots;
    }

    /**
     * For web version 
     * create slots for selected doctor and for the selected date
     */
    public function createSlotsForSelectedDoctorAndDate($payload)
    {
        $doctorId = $payload['doctor_id'];
        $selectedDate = $payload['date'];
        $doctorSlotConfiguration   = $this->getDoctorActiveAppointmentConfigDetails($doctorId);
        $slots = $this->getSelectedDateSlotsInArray($doctorSlotConfiguration, $selectedDate);

        $html = '<div>';
        $slotsStatus = true;
        if(count($slots) > 0)
        {
            foreach($slots as $slot)
            {
                // Add booked class if the slot is booked
                $slotClass = $slot['booked_status'] ? ' booked' : '';
                $isBooked = $slot['booked_status'];
                $bookedText = $isBooked ? ' (Slot Booked)' : '';
    
                $html .= '<div class="slot-group">';
                $html .= '<button class="btn btn-outline-primary mb-2 w-100 slot-btn' . $slotClass;
                $html .= ($isBooked ? ' disabled' : '') . '"';
    
                if(!$isBooked)
                {
                    $html .= ' onclick="splitButton(this)"';
                }
    
                $html .= ' >' . htmlspecialchars($slot['slot']) . $bookedText . '</button>';
    
                if(!$isBooked)
                {
                    $html .= '<div class="additional-buttons hidden mb-2">';
                    $html .= '<button id="button1" onclick="showContent(\'myDIV\')">' . htmlspecialchars($slot['slot']) . '</button>';
                    $html .= '<button id="button2" onclick="showContent(\'content2\', \'' . htmlspecialchars($slot['slot']) . '\', \'' . $selectedDate . '\', \'' . $doctorId . '\')">Next</button>';
                }
                $html .= '</div>';
                $html .= '</div>';
            }
        }
        else
        {
            $slotsStatus = false;
            $html .= '<p>No slots available for selected date!</p>';
        }
        $html .= '</div>';
        
        return [
            'slots_html'          =>  $html,
            'slot_status'  =>  $slotsStatus
        ];
    }

    public function CreateDoctorSlotCalendar($doctorSlotConfigDetails, $month = '', $year = '')
    {
        $doctorId = $doctorSlotConfigDetails->user->id;

        $startEndDate = $this->getStartAndEndDateToCreateSlots($doctorSlotConfigDetails);
        $formattedStartDate = $startEndDate['formattedStartDate'];
        $formattedEndDate = $startEndDate['formattedEndDate'];
        $exception_days_name = $startEndDate['exception_days_name'];

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

        $noSlotsFormThisDate = false;
        while ($current_day <= $number_of_days) 
        {
            if ($start_day_of_week == 7)
            {
                $start_day_of_week = 0;
                $calendar .= "</tr><tr>";
            }

            $current_day_rel = str_pad($current_day, 2, "0", STR_PAD_LEFT);

            $date = "$year-$month-$current_day_rel";
            $formattedCurrentDate = date_create($date);
            $today_date = date('Y-m-d');

            $is_today = ($date == $today_date) ? "today" : "";

            if (($formattedCurrentDate < $formattedStartDate) || ($date < $today_date) || ($formattedCurrentDate >= $formattedEndDate))
            {
                $calendar .= "<td><button class='$is_today btn not-btn'><h4>$current_day</h4></button></td>";
            }
            else
            {
                // Here we are checking multiple conditions based on doctor provided configuration to confirm 
                // If slots will be created for current loop date or not ?
                $appointmentsForCurrentDate = $this->checkIfCurrentDateAvailableForBooking($formattedCurrentDate, $exception_days_name, $doctorSlotConfigDetails);
                if($appointmentsForCurrentDate)
                {
                    // Check if doctor has set to stop for creating slots from specific date
                    if (isset($doctorSlotConfigDetails->stop_slots_date))
                    {
                        $slotEndDate = date_format(date_create($doctorSlotConfigDetails->stop_slots_date),'Y-m-d');
                        $formattedCurrentDate = $formattedCurrentDate->format('Y-m-d');
                        if ($formattedCurrentDate >= $slotEndDate)
                        {
                            $noSlotsFormThisDate = true;
                            $calendar .= "<td><button class='$is_today btn not-btn'><h4>$current_day</h4></button></td>";
                        }
                        else
                        {
                            $calendar .= "<td class='$is_today date '><button id='". $date. "' onclick='checkSlotsByDate(\"$date\", $doctorId)' type='button' class='btn avail-btn' selected_date='$date'><h4>$current_day</h4></button></td>";
                        }
                    }
                    else
                    {
                        $calendar .= "<td class='$is_today date '><button id='". $date. "' onclick='checkSlotsByDate(\"$date\", $doctorId)' type='button' class='btn avail-btn' selected_date='$date'><h4>$current_day</h4></button></td>";
                    }
                }
                else
                {
                    $btnClass = ($noSlotsFormThisDate) ? 'not-btn' : 'notAvail';
                    $calendar .= "<td><button class='$is_today btn {$btnClass}'><h4>$current_day</h4></button></td>";
                }                
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


    /**
     * Uses doctor slot configuration to get the start date of slot creation and end date of slot creation
     */
    public function getStartAndEndDateToCreateSlots($doctorSlotConfigDetails)
    {
        $slotStartDate = date_create($doctorSlotConfigDetails->start_slots_from_date);
        if($slotStartDate > today())
        {
            $startDate = $slotStartDate;
        }
        else
        {
            $startDate = today();
        }

        $endDate = clone today();
        date_modify($endDate, '+' . $doctorSlotConfigDetails->slots_in_advance . ' days');
        $formattedStartDate = date_create(date_format($startDate, 'Y-m-d'));
        $formattedEndDate   = date_create(date_format($endDate, 'Y-m-d'));

        $exception_days_name = $doctorSlotConfigDetails->doctorExceptionDays->pluck('name')->toArray();

        return [
            'formattedStartDate'    =>  $formattedStartDate,
            'formattedEndDate'      =>  $formattedEndDate,
            'exception_days_name'   =>  $exception_days_name
        ];
    }

    /**
     * Checking if current date is in the list to show appointments
     * Check 1: Check if today date's day name is added in doctor exception list
     * Check 2:  if current date's day number is greater than or equals to start day of month for creating slots
     * Check 3:  if current date's day number is less than or equals to end day of month for creating slots
     */
    public function checkIfCurrentDateAvailableForBooking($date, $exceptionDaysNames, $doctorAppointmentConfig)
    {
        $dayName = Carbon::parse($date)->format('l');
        $dayNumber = Carbon::parse($date)->format('j');
        $status = true;
        
        // Check 1: Check if today date's day name is added in doctor exception list
        if (isset($exceptionDaysNames) && count($exceptionDaysNames) > 0) {
            if (in_array($dayName, $exceptionDaysNames)) 
            {
                $status = false;
            }
        }
        
        // Check 2:  if current date's day number is greater than or equals to start day of month for creating slots
        if (isset($doctorAppointmentConfig->start_month)) 
        {
            if ((int)$dayNumber < $doctorAppointmentConfig->start_month) 
            {
                $status = false;
            }
        }
    
        // Check 3:  if current date's day number is less than or equals to end day of month for creating slots
        if (isset($doctorAppointmentConfig->end_month)) 
        {
            if ((int)$dayNumber > (int)$doctorAppointmentConfig->end_month)
            {
                $status = false;
            }
        }
        return $status;
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
