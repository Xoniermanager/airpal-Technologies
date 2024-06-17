<?php
namespace App\Http\Services;
use App\Models\Country;
use App\Http\Repositories\{DoctorWorkingHourRepository,DayOfWeekRepository};
use PhpParser\Node\Stmt\TryCatch;

class DoctorWorkingHourServices {
    private  $doctor_working_hour_repository;
    private $day_of_week_repository;
    public function __construct(
                                  DoctorWorkingHourRepository $doctor_working_hour_repository,
                                  DayOfWeekRepository $day_of_week_repository
                                  )
     {
        $this->doctor_working_hour_repository = $doctor_working_hour_repository;
        $this->day_of_week_repository = $day_of_week_repository;
     }

     public function addDoctorWorkingHour($data,  $userId)
     {
      $user_id =  $userId;
      try
       {
         foreach ($data['day'] as $day_id => $value)
         {
            $available  = isset($value['available']) ? $value['available']   : 0;
            $start_time = isset($value['start_time']) ? $value['start_time'] : null;
            $end_time   = isset($value['end_time']) ? $value['end_time']     : null;
            
            $payload = 
            [
               'available'   => $available,
               'start_time'  => $start_time,
               'end_time'    => $end_time,
            ];
            $this->doctor_working_hour_repository->updateOrCreate(
            [
               'user_id'   => $user_id,
               'day_id'    => $day_id
            ],$payload);
         }
       } 
      catch (\Exception $e) 
      {
         $e->getMessage();
      }
      
     return true;
     }

}




?>