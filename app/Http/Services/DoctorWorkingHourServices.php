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


   // public function addDoctorWorkingHour($data, $userId)
   // {
   //     $user_id = $userId;
   //     $currentDayIds = [];

   //     try {
   //         // Step 1: Fetch existing records
   //         $existingRecords = $this->doctor_working_hour_repository->where('user_id', $user_id)->get();

   //         // Step 2: Update or Create records
   //         foreach ($data['day'] as $value) {
   //             $available  = isset($value['available']) ? $value['available']   : 0;
   //             $start_time = isset($value['start_time']) ? $value['start_time'] : null;
   //             $end_time   = isset($value['end_time']) ? $value['end_time']     : null;

   //             $payload = [
   //                 'available'   => $available,
   //                 'start_time'  => $start_time,
   //                 'end_time'    => $end_time,
   //             ];

   //             $this->doctor_working_hour_repository->updateOrCreate(
   //             [
   //                 'user_id'   => $user_id,
   //                 'day_id'    => $value['day_id']
   //             ], $payload);

   //             // Collect current day IDs
   //             $currentDayIds[] = $value['day_id'];
   //         }

   //         // Step 3: Remove obsolete records
   //         foreach ($existingRecords as $record) {
   //             if (!in_array($record->day_id, $currentDayIds)) {
   //                 $record->delete();
   //             }
   //         }
   //     } catch (Exception $e) {
   //         // Handle exception
   //         Log::error('Error in addDoctorWorkingHour:', ['message' => $e->getMessage()]);
   //     }
   // }


   public function addDoctorWorkingHour($data,  $userId)
   {

      $user_id =  $userId;
      $currentDayIds = [];
      $existingRecords = $this->doctor_working_hour_repository->where('user_id', $user_id)->get();
      try {
         foreach ($data['day'] as $value) {

            $available  = isset($value['available']) ? $value['available']   : 0;
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
            // Collect current day IDs
            $currentDayIds[] = $value['day_id'];
         }

         foreach ($existingRecords as $record) {
            if (!in_array($record->day_id, $currentDayIds)) {
               $record->delete();
            }
         }
         return true;
      } catch (Exception $e) {
          $e->getMessage();
      }
   }

   //    // try
   //    //  {
   //    //    foreach ($data['day'] as $day_id => $value)
   //    //    {
   //    //       $available  = isset($value['available']) ? $value['available']   : 0;
   //    //       $start_time = isset($value['start_time']) ? $value['start_time'] : null;
   //    //       $end_time   = isset($value['end_time']) ? $value['end_time']     : null;

   //    //       $payload = 
   //    //       [
   //    //          'available'   => $available,
   //    //          'start_time'  => $start_time,
   //    //          'end_time'    => $end_time,
   //    //       ];
   //    //       $this->doctor_working_hour_repository->updateOrCreate(
   //    //       [
   //    //          'user_id'   => $user_id,
   //    //          'day_id'    => $data['day_id']
   //    //       ],$payload);
   //    //    }
   //    //  } 
   //    catch (\Exception $e) 
   //    {
   //       $e->getMessage();
   //    }

   //   return true;
   //   }

}
