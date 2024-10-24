<?php

namespace App\Http\Controllers\Patient;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\InvoiceServices;
use App\Http\Services\PatientServices;
use App\Http\Services\PatientDiaryService;
use App\Http\Services\MedicalRecordService;
use App\Http\Services\FavoriteDoctorServices;

class PatientDashboardController extends Controller
{

  private $favoriteDoctorServices;
  private $patientServices;
  private $invoiceServices;
  private $medicalRecordService;
  private $patientDiaryService;


  public function __construct(
    FavoriteDoctorServices $favoriteDoctorServices,
    PatientServices $patientServices,
    InvoiceServices $invoiceServices,
    MedicalRecordService $medicalRecordService,
    PatientDiaryService $patientDiaryService
  ) {
    $this->patientServices = $patientServices;
    $this->invoiceServices = $invoiceServices;
    $this->favoriteDoctorServices = $favoriteDoctorServices;
    $this->medicalRecordService = $medicalRecordService;
    $this->patientDiaryService = $patientDiaryService;
  }
  public function patientDashboard()
  {
    $patientId                 = Auth::user()->id;
    $patientHeartBeatGraphData = $this->patientServices->patientHeartBeatGraph($patientId);
    $medicalDetailsRecords     = $this->medicalRecordService->getMedicalRecordByPatientId(Auth::user()->id);

    $favoriteDoctorsList      = $this->favoriteDoctorServices->getAllFavoriteDoctors($patientId)->get();
    $patientPastBookings      = $this->patientServices->getPatientPastBookings($patientId);
    $patientUpcomingBookings  = $this->patientServices->getPatientBookings($patientId)->take(2);
    $patientInvoicesList      = $this->invoiceServices->getAllPatientInvoice($patientId);

    $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate(Carbon::now(), Auth::user()->id);

    if (!$diaryDetails) {
        Log::info('No diary details found for today. Checking previous month.');
        $currentDate  = Carbon::today();
        $diaryDetails = $this->getValidatePreviewsDateDiaryDetail($currentDate);
    }

    $diaryDetailsDayAfter = $this->getValidatePreviewsDateDiaryDetail($diaryDetails->created_at);

    $percentageChanges = [];

    $attributes = ['pulse_rate', 'oxygen_level','bp', 'avg_body_temp', 'avg_heart_beat','glucose'];

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
  
    
    $diaryDetails['percentage'] = $percentageChanges;
    // dd($diaryDetails);
    return view(
      'patients.dashboard.patient-dashboard',
      [
        'favoriteDoctors'           => $favoriteDoctorsList,
        'patientUpcomingBookings'   => $patientUpcomingBookings,
        'patientPastBookings'       => $patientPastBookings,
        'patientInvoicesList'       => $patientInvoicesList,
        'patientHeartBeatGraphData' => $patientHeartBeatGraphData,
        'medicalRecords'            => $medicalDetailsRecords->take(5),
        'diaryDetails'              => $diaryDetails
      ]
    );
  }

  public function getValidatePreviewsDateDiaryDetail($currentDate, $diaryDetails = null)
  {
    while (!$diaryDetails) 
    {
        Log::info('Checking diary details for date: ' . $currentDate->toDateString());

            // Define your specific date
        $specificDate = Carbon::parse($currentDate); // Replace with your specific date
        $oneDayBeforeSpecificDate = $specificDate->subDay();
        $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate($oneDayBeforeSpecificDate, Auth::user()->id);

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
            $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate($previousMonthDate, Auth::user()->id);
            if ($diaryDetails) {
                break; // Exit the loop if a record is found
            }
            break;
        }
    }
    return $diaryDetails;
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


  // public function patientHeartbeatGraphData(Request $request)
  // {
  //       $period = $request->period;
  //       $patientId  = Auth::user()->id;
  //       // Initialize period variables
  //       $daysInMonth    = Carbon::now()->daysInMonth;
  //       $bookingByMonth = array_fill(1, 12, 0);
  //       $bookingByYear  = array_fill(Carbon::now()->year, 11, 0);
  //       $bookingByDate  = array_fill(1, $daysInMonth, 0);

  //       // Fetch recent appointments
  //       $appointments = $this->patientServices->patientHeartBeatGraph($patientId);
  //       foreach ($appointments as $appointment) {

  //               $date = Carbon::parse($appointment->created_at);
  //               if ($period === 'monthly' || $period === 'currentMonth') {
  //                   $month = (int)$date->format('n');
  //                   $bookingByMonth[$month] += 1; // Count bookings for each month

  //                   if ($period === 'currentMonth' && $date->month === Carbon::now()->month) {
  //                       $day = (int)$date->format('j');
  //                       $bookingByDate[$day] += $appointment->avg_heart_beat; // Count bookings for each day in the current month
  //                   }
  //               } elseif ($period === 'yearly') {
  //                   $year = $date->year;
  //                   if (!isset($bookingByYear[$year])) {
  //                       $bookingByYear[$year] = 0;
  //                   }
  //                   $bookingByYear[$year] += 1;

  //           }
  //       }
  //       $result = [];
  //       if ($period === 'monthly') {
  //           foreach ($bookingByMonth as $month => $count) {
  //               $result[] = [$month, $count];
  //           }
  //       } elseif ($period === 'yearly') {
  //           foreach ($bookingByYear as $year => $count) {
  //               $result[] = [$year, $count];
  //           }
  //       } elseif ($period === 'currentMonth') {

  //           foreach ($bookingByDate as $day => $count) {
  //               $result[] = [$day, $count];
  //           }
  //       }
  //       return $result;
  //   }


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

  public function patientAccounts()
  {
    return view('patients.patient-accounts');
  }
  public function patientAppointmentDetails()
  {
    return view('patients.patient-appointment-details');
  }

  public function patientPassword()
  {
    return view('patients.patient-password');
  }
  public function Dependant()
  {
    return view('patients.dependant');
  }
  public function patientFavourites()
  {
    return view('patients.favorites');
  }
  public function patientMedical()
  {
    return view('patients.medical');
  }
}
