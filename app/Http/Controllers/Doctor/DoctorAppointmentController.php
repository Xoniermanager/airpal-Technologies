<?php

namespace App\Http\Controllers\Doctor;


use App\Models\BookingSlots;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\DoctorDashboardServices;
use App\Http\Requests\SearchAppointmentsRequest;

class DoctorAppointmentController extends Controller
{
    private $user_services;
    private $bookingServices;
    private $doctorDashboardServices;
    public function __construct(UserServices $user_services, BookingServices $bookingServices,DoctorDashboardServices $doctorDashboardServices)
    {
        $this->user_services   = $user_services;
        $this->bookingServices = $bookingServices;
        $this->doctorDashboardServices = $doctorDashboardServices;
        
    }

    public function doctorAppointments()
    {
        $getTotalAppointment = $this->doctorDashboardServices->getTotalAppointment();
        $todayAppointments   = $this->doctorDashboardServices->getTodayAppointmentCounter();
        $getUpComingAppointment   = $this->doctorDashboardServices->getAllUpcomingAppointments();
        $getAllCanceledAppointments   = $this->doctorDashboardServices->getAllCanceledAppointments();
        $getAllConfirmedAppointments   = $this->doctorDashboardServices->getAllConfirmedAppointments();

        $doctorDetails   = $this->user_services->getDoctorDataById(auth::id());
        $allAppointments = $this->bookingServices->doctorBookings(auth::id())->get();
        return view('doctor.appointments.doctor-appointments',[
         'doctorDetails' => $doctorDetails, 
         'bookings' => $allAppointments,
         'todayBookingCounter' => $todayAppointments,
         'doctorTotalAppointmentCounter' => $getTotalAppointment,
         'getUpComingAppointmentCounter' => count($getUpComingAppointment),
         'getAllCanceledAppointments' => count($getAllCanceledAppointments),
         'getAllConfirmedAppointments'   =>  count($getAllConfirmedAppointments),
        ]);
    }
    public function appointmentRequests()
    {
        
        $allRequestedAppointments = $this->bookingServices->requestedAppointment(auth::id())->get();
        return view('doctor.request.patient-request',['allRequest' => $allRequestedAppointments]);
    }

    public function doctorAppointmentDetails()
    {
        $doctorDetails = $this->user_services->getDoctorDataById(auth::id());
        return view('doctor.appointments.doctor-appointment-details', ['doctorDetails' => $doctorDetails]);
    }

    public function doctorAppointmentFilter(SearchAppointmentsRequest $searchAppointmentsRequest)
    {
        $filterParams = $searchAppointmentsRequest->validated();
        $filtered  = $this->bookingServices->searchDoctorAppointments($filterParams);

        $gridHtml = view("doctor.appointments.appointment-list", [
          'bookings' =>  $filtered
        ])->render();

        $listHtml = view("doctor.appointments.list-view-appointment", [
          'bookings' =>  $filtered
        ])->render();

        return response()->json([
            'success' => 'Searching',
            'data'   =>  [
              'list'  =>  $listHtml,
              'grid'  =>  $gridHtml
            ]
          ]);
    }
    public function doctorAppointmentSearch(Request $request)
    {
        $filterKey = $request->key;
        $doctorId  = $request->doctorId;
        $filtered  = $this->bookingServices->doctorAppointmentSearch($filterKey, '', $doctorId);
        return response()->json([
            'success' => 'Searching',
            'data'   =>  view("doctor.appointments.appointment-list", [
              'bookings' =>  $filtered
            ])->render()
          ]);
    }

    

    public function UpdateAppointmentStatus(Request $request)
    {
        $updateRequest   = $this->bookingServices->update($request->all(),$request->patientId);
        $allAppointments = $this->bookingServices->requestedAppointment(Auth::id())->get();

        if($updateRequest)
        {
            return response()->json([
                'success'    =>  'Update successfully',
                'requestCounter' => count($allAppointments),
                'data'       =>  view("doctor.request.list", [
                'allRequest' =>  $allAppointments ,
                ])->render()
              ]);
        }
    }

    public function filterRequestAppointments(Request $request)
    {
        $filterKey = $request->filterKey;
        $doctorId  = Auth::id();
        $filtered  = $this->bookingServices->filterRequestAppointments($filterKey,$doctorId);
        return response()->json([
            'success' => 'Filtering',
            'data'    =>  view("doctor.request.list", [
              'allRequest' =>  $filtered,

            ])->render()
          ]);
    }
}
