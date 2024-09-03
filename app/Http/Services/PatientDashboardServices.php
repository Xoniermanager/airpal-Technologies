<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
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