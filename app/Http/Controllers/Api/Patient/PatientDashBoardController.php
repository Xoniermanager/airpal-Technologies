<?php

namespace App\Http\Controllers\Api\Patient;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;

class PatientDashboardController extends Controller
{

  private $userServices;
  private $bookingServices;

  public function __construct(BookingServices $bookingServices,UserServices $userServices)
  {
    $this->bookingServices = $bookingServices;
    $this->userServices = $userServices;
  }
  public function getDashBoardData()
  {
    try {
      $data =
        [
          'upcomingAppointments' =>  $this->getUpcomingAppointment() ?? '',
          'recommendedDoctors'   =>  $this->getRecommendedDoctors() ?? '',
          'popularDoctors'       =>  $this->getPopularDoctors() ?? ''
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
      $doctorBookingCounts = $allBookings->groupBy('doctor_id')->map(function($group) { return $group->count(); })->sortDesc();
      $topDoctorIds   = $doctorBookingCounts->keys();
      $popularDoctors = User::whereIn('id', $topDoctorIds)
                                 ->get()
                                 ->map(function($doctor) use ($doctorBookingCounts) {
                                     $doctor->booking_count = $doctorBookingCounts[$doctor->id];
                                     return $doctor;
                                 });
  
      return $popularDoctors;
  }
  

  public function getUpcomingAppointment()
  {
    return $this->bookingServices->patientUpcomingBookings(9)->get();
  }
}
