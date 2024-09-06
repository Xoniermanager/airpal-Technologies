<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAppointmentConfigRequest;
use App\Http\Services\DoctorAppointmentConfigService;
use App\Models\DoctorAppointmentConfig;

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

    /**
     * List all appointment configs for currently logged in doctor
     * It will include active, upcoming and expired appointment configurations
     */
    public function allAppointmentConfig()
    {
        $userId = Auth::user()->id;
        $data = $this->doctorSlotServices->getAllActiveExpiredAppointmentConfigsForDoctor($userId);

        return view('doctor.appointments.all-appointment-config', [
            'appointmentConfigs'    => $data,
            'status'                => true,
            'message'               =>  'All appointment configurations hav been retrieved successfully!'
        ]);
    }


    public function addAppointmentConfig(StoreAppointmentConfigRequest $request)
    {
        $data = $request->validated();
        $status = true;
        $appointmentConfigDetailsSaveResponse = $this->doctorSlotServices->addDoctorAppointmentConfig($data);

        if($appointmentConfigDetailsSaveResponse)
        {
            $status = true;
        }
        else
        {
            $status = false;
        }

        return response()->json([
            'data'    => $appointmentConfigDetailsSaveResponse,
            'status'  => $status,
            'message'   =>  'Appointment configuration details saved successfully!'
        ]);
    }


    public function updateAppointmentConfig(StoreAppointmentConfigRequest $request,DoctorAppointmentConfig $doctorAppointmentConfig)
    {
        $data = $request->validated();
        $appointmentConfigDetailsSaveResponse = $this->doctorSlotServices->updateSlot($data, $doctorAppointmentConfig);

        return response()->json([
            'data'    => $appointmentConfigDetailsSaveResponse['data'],
            'status'  => $appointmentConfigDetailsSaveResponse['status'],
            'message' => $appointmentConfigDetailsSaveResponse['message'],
        ]);
    }
}
