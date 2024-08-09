<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\FavoriteDoctorServices;
use App\Http\Services\InvoiceServices;
use App\Http\Services\PatientServices;

class PatientDashboardController extends Controller
{

  private $favoriteDoctorServices;
  private $patientServices;

  private $invoiceServices;

  public function __construct(FavoriteDoctorServices $favoriteDoctorServices, PatientServices $patientServices,InvoiceServices $invoiceServices)
  {
    $this->patientServices = $patientServices;
    $this->invoiceServices = $invoiceServices;
    $this->favoriteDoctorServices = $favoriteDoctorServices;
  }
  public function patientDashboard()
  {
    $patientId = Auth::user()->id;
    $favoriteDoctorsList      = $this->favoriteDoctorServices->getAllFavoriteDoctors($patientId)->get();
    $patientPastBookings      = $this->patientServices->getPatientPastBookings($patientId);
    $patientUpcomingBookings  = $this->patientServices->getPatientBookings($patientId);
     $patientInvoicesList      = $this->invoiceServices->getAllPatientInvoice($patientId);



    return view(
      'patients.dashboard.patient-dashboard',
      [
        'favoriteDoctors'         => $favoriteDoctorsList,
        'patientUpcomingBookings' => $patientUpcomingBookings,
        'patientPastBookings'     => $patientPastBookings,
        'patientInvoicesList'     => $patientInvoicesList
      ]
    );
  }

  public function patientAccounts()
  {
    return view('patients.patient-accounts');
  }
  public function patientAppointmentDetails()
  {
    return view('patients.patient-appointment-details');
  }

  public function patientDependant()
  {
    return view('patients.patient-dependant');
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
  public function patientRecords()
  {
    return view('patients.records');
  }
}
