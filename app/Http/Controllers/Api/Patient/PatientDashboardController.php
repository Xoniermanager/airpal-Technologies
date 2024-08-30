<?php

namespace App\Http\Controllers\Api\Patient;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\PatientDashboardServices;
use App\Http\Services\PatientServices;
use App\Http\Services\PatientDiaryService;

class PatientDashboardController extends Controller
{

  private $userServices;
  private $bookingServices;
  private $patientDiaryService;
  private $patientServices;

  private $patientDashboardServices;
  


  public function __construct(BookingServices $bookingServices, UserServices $userServices, PatientDiaryService $patientDiaryService, PatientServices $patientServices,PatientDashboardServices $patientDashboardServices)
  {
    $this->bookingServices = $bookingServices;
    $this->userServices = $userServices;
    $this->patientServices = $patientServices;
    $this->patientDashboardServices = $patientDashboardServices;
    $this->patientDiaryService = $patientDiaryService;
  }
  public function getDashBoardData()
  {
    try {

      $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate(Carbon::now(), Auth()->guard('api')->user()->id);
      if ($diaryDetails) {

        $diaryDetailsDayAfter = $this->getValidatePreviewsDateDiaryDetail($diaryDetails->created_at);
        $percentageChanges = [];
        $attributes = ['pulse_rate', 'oxygen_level', 'bp', 'avg_body_temp', 'avg_heart_beat', 'glucose'];

        foreach ($attributes as $attribute) {
          $currentValue = $diaryDetails->$attribute ?? null;
          $previousValue = $diaryDetailsDayAfter->$attribute ?? null;

          if ($currentValue !== null && $previousValue !== null && $previousValue != 0) {
            $percentageChange = (($currentValue - $previousValue) / $previousValue) * 100;
            $percentageChanges[$attribute] = round($percentageChange, 2); // Round to 2 decimal places
          } elseif ($previousValue === null && $currentValue !== null) {
            $percentageChanges[$attribute] = 100.00; // Indicating a 100% increase from no data
          } elseif ($currentValue === null && $previousValue !== null) {
            $percentageChanges[$attribute] = -100.00; // Indicating a 100% decrease to no data
          } else {
            $percentageChanges[$attribute] = 'N/A';
          }
        }
        $patientHealthGraphsData = $this->patientDashboardServices->patientHealthGraphsData(now()->month,Auth()->guard('api')->user()->id); 

        $diaryDetails['percentage'] = $percentageChanges;
      } else {
        $diaryDetails['percentage']  = '';
      }

      $data =
        [
          'upcomingAppointments' =>  $this->getUpcomingAppointment() ?? '',
          'recommendedDoctors'   =>  $this->getRecommendedDoctors() ?? '',
          'popularDoctors'       =>  $this->getPopularDoctors() ?? '',
          'diaryDetails'         =>  $diaryDetails,
          'patientHealthGraphsData' => $patientHealthGraphsData ?? ''
        ];
        
      if ($data) {
        return response()->json([
          "status"  => "success",
          "message" => "",
          "data"    => $data
        ]);
      }
    } catch (\Throwable $th) {
      return response()->json([
        'success' => false,
        'message' => $th->getMessage()
      ], 500);
    }
  }

  public function getValidatePreviewsDateDiaryDetail($currentDate, $diaryDetails = null)
  {
    while (!$diaryDetails) {
      Log::info('Checking diary details for date: ' . $currentDate->toDateString());

      // Define your specific date
      $specificDate = Carbon::parse($currentDate); // Replace with your specific date
      $oneDayBeforeSpecificDate = $specificDate->subDay();
      $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate($oneDayBeforeSpecificDate, Auth()->guard('api')->user()->id);

      if ($diaryDetails) {
        Log::info('Diary details found for date: ' . $currentDate->toDateString());
        break; // Exit the loop if a record is found
      }

      // Move to the previous day
      $currentDate = $currentDate->subDay();

      // If we have checked all days in the current month, move to the previous month
      if ($currentDate->isLastOfMonth()) {
        // Move to the last day of the previous month
        $previousMonthDate = $currentDate->startOfMonth()->subDay();
        $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate($previousMonthDate, Auth()->guard('api')->user()->id);
        if ($diaryDetails) {
          break; // Exit the loop if a record is found
        }
        break;
      }
    }
    return $diaryDetails;
  }

  public function getRecommendedDoctors()
  {
    $previousBookings   =  $this->bookingServices->patientBookings(9)->first();
    $bookedDoctor       =  $previousBookings->user;
    $specialtiesArray   =  $bookedDoctor->specializations->pluck('name')->toArray();
    $recommendedDoctors =  User::whereHas('specializations', function ($query) use ($specialtiesArray) {
      $query->whereIn('name', $specialtiesArray);
    })->get();
    return $recommendedDoctors;
  }

  public function getPopularDoctors()
  {

    $allBookings   = $this->bookingServices->all();
    $doctorBookingCounts = $allBookings->groupBy('doctor_id')->map(function ($group) {
      return $group->count();
    })->sortDesc();
    $topDoctorIds   = $doctorBookingCounts->keys();
    $popularDoctors = User::whereIn('id', $topDoctorIds)
      ->get()
      ->map(function ($doctor) use ($doctorBookingCounts) {
        $doctor->booking_count = $doctorBookingCounts[$doctor->id];
        return $doctor;
      });

    return $popularDoctors;
  }


  public function getUpcomingAppointment()
  {
    return $this->bookingServices->patientUpcomingBookings(Auth::guard('api')->user()->id)->get();
  }


  public function patientHeartbeatGraphData(Request $request)
  {
    $period = $request->period;
    $patientId  = Auth::user()->id;

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

  public function patientBloodPressureGraphData(Request $request)
  {

    $period = $request->period;
    $patientId  = Auth::user()->id;

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

  public function patientBodyTempGraphData(Request $request)
  {

    $period = $request->period;
    $patientId  = Auth::user()->id;

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

  public function patientOxygenGraphData(Request $request)
  {

    $period = $request->period;
    $patientId  = Auth::user()->id;

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
  public function patientGlucoseGraphData(Request $request)
  {

    $period = $request->period;
    $patientId  = Auth::user()->id;

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
