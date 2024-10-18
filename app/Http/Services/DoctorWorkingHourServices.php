<?php

namespace App\Http\Services;

use Exception;
use App\Models\Country;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Repositories\{DoctorWorkingHourRepository, DayOfWeekRepository};

class DoctorWorkingHourServices
{
   private  $doctor_working_hour_repository;
   private $day_of_week_repository;
   public function __construct(
      DoctorWorkingHourRepository $doctor_working_hour_repository,
      DayOfWeekRepository $day_of_week_repository
   ) {
      $this->doctor_working_hour_repository = $doctor_working_hour_repository;
      $this->day_of_week_repository = $day_of_week_repository;
   }

   public function addDoctorWorkingHour($data,  $userId)
   {
      $user_id =  $userId;
      $notAvailableDaysIds = [];
      try {
         foreach ($data['day'] as $value) 
         {
            if(isset($value['available']) && $value['available'] == 1 && !empty($value['start_time']) && !empty($value['end_time']))
            {
               $available  = 1;
               $start_time = isset($value['start_time']) ? $value['start_time'] : null;
               $end_time   = isset($value['end_time']) ? $value['end_time']     : null;

               $payload = [
                  'available'   => $available,
                  'start_time'  => $start_time,
                  'end_time'    => $end_time,
               ];

               $this->doctor_working_hour_repository->updateOrCreate(
                  [
                     'user_id'   => $user_id,
                     'day_id'    => $value['day_id']
                  ],
                  $payload
               );
            }
            else
            {
               // Days with available value = 0, should be deleted from database if exists.
               $notAvailableDaysIds[] = $value['day_id'];
               continue;
            }
         }

         $this->doctor_working_hour_repository->whereIn('day_id',$notAvailableDaysIds)->delete();
         return true;
      } catch (Exception $e) {
          $e->getMessage();
      }
   }
}
