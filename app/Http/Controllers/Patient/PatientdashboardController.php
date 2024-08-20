<?php

namespace App\Http\Controllers\Patient;

use Carbon\Carbon;
use Illuminate\Http\Request;
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
  private $medicalDetailsService;
  private $patientDiaryService;


  public function __construct(
    FavoriteDoctorServices $favoriteDoctorServices,
    PatientServices $patientServices,
    InvoiceServices $invoiceServices,
    MedicalRecordService $medicalDetailsService,
    PatientDiaryService $patientDiaryService
  ) {
    $this->patientServices = $patientServices;
    $this->invoiceServices = $invoiceServices;
    $this->favoriteDoctorServices = $favoriteDoctorServices;
    $this->medicalDetailsService = $medicalDetailsService;
    $this->patientDiaryService = $patientDiaryService;
  }
  public function patientDashboard()
  {
    $patientId                 = Auth::user()->id;
    $patientHeartBeatGraphData = $this->patientServices->patientHeartBeatGraph($patientId);
    $medicalDetailsRecords     = $this->medicalDetailsService->getMedicalRecordByPatientId(Auth::user()->id);


    $favoriteDoctorsList      = $this->favoriteDoctorServices->getAllFavoriteDoctors($patientId)->get();
    $patientPastBookings      = $this->patientServices->getPatientPastBookings($patientId);
    $patientUpcomingBookings  = $this->patientServices->getPatientBookings($patientId);
    $patientInvoicesList      = $this->invoiceServices->getAllPatientInvoice($patientId);

    $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate(Carbon::today(), Auth::user()->id);


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
