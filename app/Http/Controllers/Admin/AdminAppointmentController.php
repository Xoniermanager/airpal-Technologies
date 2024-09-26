<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorService;
use App\Http\Services\BookingServices;

class AdminAppointmentController extends Controller
{

  private $bookingServices;
  private $doctorServices;

  public function __construct(BookingServices $bookingServices,DoctorService $doctorServices)
  {
      $this->bookingServices = $bookingServices;
      $this->doctorServices   = $doctorServices;
  }



  public function appointmentList()
  {
      $appointmentList = $this->bookingServices->getPaginateData();
      $doctorList  = $this->doctorServices->getAllDoctorsList();
      return view('admin.appointments.appointments', [ 'appointments_list' => $appointmentList, 'doctorList' => $doctorList ]);
  }

  public function appointmentFilter(Request $request)
  {
    $filtered  = $this->bookingServices->searchDoctorAppointments($request->all());
    return response()->json([
      'message' => 'Retrieved Successfully!',
      'data'   =>  view('admin.appointments.all-appointments', [
        'appointments_list' =>  $filtered
      ])->render()
  ]);
  }

}
