<?php

namespace App\Http\Controllers\Admin;

use App\Models\DayOfWeek;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Models\DoctorAppointmentConfig;
use App\Http\Requests\StoreAppointmentConfigRequest;
use App\Http\Services\DoctorAppointmentConfigService;

class DoctorAppointmentConfigController extends Controller
{

    private $doctorSlotServices;
    private $userServices;

    public function __construct(DoctorAppointmentConfigService $doctorSlotServices, UserServices $userServices)
    {
        $this->doctorSlotServices = $doctorSlotServices;
        $this->userServices = $userServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allDoctorList  = $this->userServices->all();
        $weekDays       = DayOfWeek::all();
        $allSlotDetails = $this->doctorSlotServices->getSlotsPaginated();
        return view('admin.doctor_slots.index', ['weekDays' => $weekDays, 'allSlotDetails' => $allSlotDetails, 'doctors' => $allDoctorList]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentConfigRequest $request)
    {
        if ($this->doctorSlotServices->addDoctorAppointmentConfig($request->all())) {
            return response()->json([
                'message' => 'success',
                'data'   =>  view('admin.doctor_slots.slot-list', [
                    'allSlotDetails' => $this->doctorSlotServices->getSlotsPaginated()
                ])->render()
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateSlot(StoreAppointmentConfigRequest $request, DoctorAppointmentConfig $doctorAppointmentConfig)
    {
        $data = $request->validated();
        $appointmentConfigDetailsSaveResponse = $this->doctorSlotServices->updateSlot($data, $doctorAppointmentConfig);
        return response()->json([
            'data'    => $appointmentConfigDetailsSaveResponse['data'],
            'status'  => $appointmentConfigDetailsSaveResponse['status'],
            'message' => $appointmentConfigDetailsSaveResponse['message'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($this->doctorSlotServices->deleteSlot($request->id)) {
            return response()->json([
                'message' => 'update Successfully!',
                'data'   =>  view('admin.doctor_slots.slot-list', [
                    'allSlotDetails' => $this->doctorSlotServices->getSlotsPaginated()
                ])->render()
            ]);
        }
    }

    public function getWeekDays()
    {
        return DayOfWeek::all();
    }

    public function getDocotorSlotDetails($doctorId)
    {
        $doctorAppointmentConfigDetails = $this->doctorSlotServices->getDoctorActiveAppointmentConfigDetails($doctorId);
        // Check if $doctorAppointmentConfigDetails is null before accessing its properties
        $exceptionIds = $doctorAppointmentConfigDetails ? optional($doctorAppointmentConfigDetails->doctorExceptionDays)->pluck('exception_days_id') ?? collect() : collect();
        if (isset($doctorAppointmentConfigDetails) && !empty($doctorAppointmentConfigDetails)) {
            return response()->json(['status' => true, 'config_details' => $doctorAppointmentConfigDetails, 'exceptionIds' => $exceptionIds]);
        }
        else {
            return response()->json(['status' => false]);
        }
    }
}
