<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSlotRequest;
use App\Http\Services\DoctorAppointmentConfigService;

class AppointmentConfigController extends Controller
{
    private $doctorSlotServices;
    private $userServices;

    public function __construct(DoctorAppointmentConfigService $doctorSlotServices,UserServices $userServices){
        $this->doctorSlotServices = $doctorSlotServices;
        $this->userServices = $userServices;
    }
    public function appointmentConfig()
    {
        $userId = Auth::user()->id;
        $doctorAppointmentConfigDetails = $this->doctorSlotServices->getDoctorSlotConfiguration($userId);
        // Check if $doctorAppointmentConfigDetails is null before accessing its properties
        $exceptionIds = $doctorAppointmentConfigDetails ? optional($doctorAppointmentConfigDetails->doctorExceptionDays)->pluck('exception_days_id') ?? collect() : collect();
        return view('doctor.appointments.appointment-config', [
            'doctorAppointmentConfigDetails' => $doctorAppointmentConfigDetails,
            'exceptionIds' => $exceptionIds
        ]);
        
        
    }

    public function addAppointmentConfig(StoreSlotRequest $request)
    {
        if ($this->doctorSlotServices->updateSlot($request->all())) {
            return response()->json([
                'message' => 'success',
                'data'    => '',
                'status'  => true
            ]);
        }
    }
}
