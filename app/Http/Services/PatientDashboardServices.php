<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\Auth;


class PatientDashboardServices
{

   private  $patientServices;

   public function __construct(PatientServices $patientServices)
   {

      $this->patientServices = $patientServices;
   }

   public function patientHealthGraphsData($period,$patientId)
   {
      $healthGraphsData  = [
        'heartBeat'     =>  $this->patientHeartbeatGraphData($period,$patientId),
        'bloodPressure' =>  $this->patientBloodPressureGraphData($period,$patientId),
        'bodyTemp'      =>  $this->patientBodyTempGraphData($period,$patientId),
        'oxygen'        =>  $this->patientOxygenGraphData($period,$patientId),
        'glucose'       =>  $this->patientGlucoseGraphData($period,$patientId),
      ];
      return $healthGraphsData;
   }


  public function patientHealthGraphData($graphName,$period,$patientId)
  {
     // Initialize period variables
     $daysInMonth = Carbon::now()->month((int)$period)->daysInMonth; // Get days for the specified month
     $bookingByDate = array_fill(1, $daysInMonth, 0);
 
     $appointments = $this->patientServices->patientHealthGraphs($patientId);

 
     foreach ($appointments as $appointment) {
       $date = Carbon::parse($appointment->created_at);
 
       if (is_numeric($period)) {
        if ($date->month == $period) { // Check if the appointment is in the specified month
            $day = (int)$date->format('j');

            // Use nested if-else to determine which field to sum
            if ($graphName === 'heart_beat') {
                $bookingByDate[$day] += $appointment->avg_heart_beat; 
              } elseif ($graphName === 'blood_pressure') {
                $bookingByDate[$day] += $appointment->bp;
              } elseif ($graphName === 'body_temperature') {
                $bookingByDate[$day] += $appointment->avg_body_temp;
            } elseif ($graphName === 'oxygen') {
                $bookingByDate[$day] += $appointment->oxygen_level; 
            } elseif ($graphName === 'glucose') {
                $bookingByDate[$day] += $appointment->glucose; 
            } else {
                // Handle other cases or throw an exception
                throw new InvalidArgumentException("Invalid graph name: $graphName");
            }
        }
       } elseif ($period === 'yearly') {
        $year = $date->year;
        if (!isset($bookingByYear[$year])) {
            $bookingByYear[$year] = 0;
        }

        // Use nested if-else to determine which field to sum
        if ($graphName === 'heart_beat') {
            $bookingByYear[$year] += $appointment->avg_heart_beat; // Sum heartbeat
        } elseif ($graphName === 'blood_pressure') {
            $bookingByYear[$year] += $appointment->bp; // Sum oxygen level
          } elseif ($graphName === 'body_temperature') {
            $bookingByYear[$year] += $appointment->avg_body_temp; // Sum oxygen level
          } elseif ($graphName === 'oxygen') {
            $bookingByYear[$year] += $appointment->oxygen_level; // Sum oxygen level
        } elseif ($graphName === 'glucose') {
            $bookingByYear[$year] += $appointment->glucose; // Sum glucose level
        } else {
            // Handle other cases or throw an exception
            throw new InvalidArgumentException("Invalid graph name: $graphName");
        }
     }
 
     $result = [];
     if (is_numeric($period)) { // For specific month
       foreach ($bookingByDate as $day => $count) {
         $result[] = [$day, $count];
       }
     } elseif ($period === 'yearly') {
       foreach ($bookingByYear as $year => $count) {
         $result[] = [$year, $count];
       }
     }
 
     return $result;

  }
}
    

   public function patientHeartbeatGraphData($period ,$patientId)
   {
     // Initialize period variables
     $daysInMonth = Carbon::now()->month((int)$period)->daysInMonth; // Get days for the specified month
     $bookingByDate = array_fill(1, $daysInMonth, 0);
 
     $appointments = $this->patientServices->patientHeartBeatGraph($patientId);
 
     foreach ($appointments as $appointment) {
       $date = Carbon::parse($appointment->created_at);
 
       if (is_numeric($period)) {
         if ($date->month == $period) { // Check if the appointment is in the specified month
           $day = (int)$date->format('j');
           $bookingByDate[$day] += $appointment->avg_heart_beat; // Sum heartbeats for each day
         }
       } elseif ($period === 'yearly') {
         $year = $date->year;
         if (!isset($bookingByYear[$year])) {
           $bookingByYear[$year] = 0;
         }
         $bookingByYear[$year] += 1;
       }
     }
 
     $result = [];
     if (is_numeric($period)) { // For specific month
       foreach ($bookingByDate as $day => $count) {
         $result[] = [$day, $count];
       }
     } elseif ($period === 'yearly') {
       foreach ($bookingByYear as $year => $count) {
         $result[] = [$year, $count];
       }
     }
 
     return $result;
   }
 
   public function patientBloodPressureGraphData($period ,$patientId)
   {
 
     // Initialize period variables
     $daysInMonth = Carbon::now()->month((int)$period)->daysInMonth; // Get days for the specified month
     $bookingByDate = array_fill(1, $daysInMonth, 0);
 
     $appointments = $this->patientServices->patientHeartBeatGraph($patientId);
 
     foreach ($appointments as $appointment) {
       $date = Carbon::parse($appointment->created_at);
 
       if (is_numeric($period)) {
         if ($date->month == $period) { // Check if the appointment is in the specified month
           $day = (int)$date->format('j');
           $bookingByDate[$day] += $appointment->bp;
         }
       } elseif ($period === 'yearly') {
         $year = $date->year;
         if (!isset($bookingByYear[$year])) {
           $bookingByYear[$year] = 0;
         }
         $bookingByYear[$year] += 1;
       }
     }
 
     $result = [];
     if (is_numeric($period)) { // For specific month
       foreach ($bookingByDate as $day => $count) {
         $result[] = [$day, $count];
       }
     } elseif ($period === 'yearly') {
       foreach ($bookingByYear as $year => $count) {
         $result[] = [$year, $count];
       }
     }
 
     return $result;
   }
 
   public function patientBodyTempGraphData($period ,$patientId)
   {
 
     // Initialize period variables
     $daysInMonth = Carbon::now()->month((int)$period)->daysInMonth; // Get days for the specified month
     $bookingByDate = array_fill(1, $daysInMonth, 0);
 
     $appointments = $this->patientServices->patientBodyTempGraph($patientId);
 
     foreach ($appointments as $appointment) {
       $date = Carbon::parse($appointment->created_at);
 
       if (is_numeric($period)) {
         if ($date->month == $period) { // Check if the appointment is in the specified month
           $day = (int)$date->format('j');
           $bookingByDate[$day] += $appointment->avg_body_temp; // Sum heartbeats for each day
         }
       } elseif ($period === 'yearly') {
         $year = $date->year;
         if (!isset($bookingByYear[$year])) {
           $bookingByYear[$year] = 0;
         }
         $bookingByYear[$year] += 1;
       }
     }
 
     $result = [];
     if (is_numeric($period)) { // For specific month
       foreach ($bookingByDate as $day => $count) {
         $result[] = [$day, $count];
       }
     } elseif ($period === 'yearly') {
       foreach ($bookingByYear as $year => $count) {
         $result[] = [$year, $count];
       }
     }
     return $result;
   }
 
   public function patientOxygenGraphData($period ,$patientId)
   {
  
     // Initialize period variables
     $daysInMonth = Carbon::now()->month((int)$period)->daysInMonth; // Get days for the specified month
     $bookingByDate = array_fill(1, $daysInMonth, 0);
 
     $appointments = $this->patientServices->patientBodyTempGraph($patientId);
 
     foreach ($appointments as $appointment) {
       $date = Carbon::parse($appointment->created_at);
 
       if (is_numeric($period)) {
         if ($date->month == $period) { // Check if the appointment is in the specified month
           $day = (int)$date->format('j');
           $bookingByDate[$day] += $appointment->oxygen_level; // Sum heartbeats for each day
         }
       } elseif ($period === 'yearly') {
         $year = $date->year;
         if (!isset($bookingByYear[$year])) {
           $bookingByYear[$year] = 0;
         }
         $bookingByYear[$year] += 1;
       }
     }
 
     $result = [];
     if (is_numeric($period)) { // For specific month
       foreach ($bookingByDate as $day => $count) {
         $result[] = [$day, $count];
       }
     } elseif ($period === 'yearly') {
       foreach ($bookingByYear as $year => $count) {
         $result[] = [$year, $count];
       }
     }
     return $result;
   }
   public function patientGlucoseGraphData($period ,$patientId)
   {
 
     // Initialize period variables
     $daysInMonth = Carbon::now()->month((int)$period)->daysInMonth; // Get days for the specified month
     $bookingByDate = array_fill(1, $daysInMonth, 0);
 
     $appointments = $this->patientServices->patientBodyTempGraph($patientId);
 
     foreach ($appointments as $appointment) {
       $date = Carbon::parse($appointment->created_at);
 
       if (is_numeric($period)) {
         if ($date->month == $period) { // Check if the appointment is in the specified month
           $day = (int)$date->format('j');
           $bookingByDate[$day] += $appointment->glucose; // Sum heartbeats for each day
         }
       } elseif ($period === 'yearly') {
         $year = $date->year;
         if (!isset($bookingByYear[$year])) {
           $bookingByYear[$year] = 0;
         }
         $bookingByYear[$year] += 1;
       }
     }
 
     $result = [];
     if (is_numeric($period)) { // For specific month
       foreach ($bookingByDate as $day => $count) {
         $result[] = [$day, $count];
       }
     } elseif ($period === 'yearly') {
       foreach ($bookingByYear as $year => $count) {
         $result[] = [$year, $count];
       }
     }
     return $result;
   }


}