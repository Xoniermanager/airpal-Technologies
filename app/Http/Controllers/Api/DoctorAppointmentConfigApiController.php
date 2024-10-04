<?php

namespace App\Http\Controllers\Api;

use DateTime;
use App\Models\DayOfWeek;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\BookingServices;
use App\Http\Requests\StoreAppointmentConfigRequest;
use App\Http\Services\DoctorAppointmentConfigService;

class DoctorAppointmentConfigApiController extends Controller
{
    private $doctorSlotServices;
    private $userServices;
    private $bookingServices;

    public function __construct(DoctorAppointmentConfigService $doctorSlotServices, UserServices $userServices, BookingServices $bookingServices)
    {
        $this->doctorSlotServices = $doctorSlotServices;
        $this->userServices = $userServices;
        $this->bookingServices = $bookingServices;
    }

    public function index(Request $request)
    {
        $allDoctorList  = $this->userServices->all();
        $weekDays       = DayOfWeek::all();
        $allSlotDetails = $this->doctorSlotServices->getSlotsPaginated();
        return view('admin.doctor_slots.index', ['weekDays' => $weekDays, 'allSlotDetails' => $allSlotDetails, 'doctors' => $allDoctorList]);
    }


    public function store(StoreAppointmentConfigRequest $request)
    {
        $response =  $this->doctorSlotServices->addDoctorAppointmentConfig($request->all());
        if ($response) { {
                return response()->json([
                    "status"  => "success",
                    "message" => "Doctor address details saved!",
                    "data"    => $response
                ]);
            }
        }
    }

    public function update(StoreAppointmentConfigRequest $request)
    {
        $response =  $this->doctorSlotServices->updateSlot($request->all());
        if ($response) {
            return response()->json([
                "status"  => "success",
                "message" => "Doctor address details saved!",
                "data"    => $response,

            ]);
        }
    }
    public function get($id)
    {
        $response = $this->doctorSlotServices->getSlotsBySlotId($id);
        if ($response) {
            return response()->json([
                "status"  => "success",
                "message" => "Doctor slot retrieve successfully",
                "data"    => $response,

            ]);
        }
    }
    public function delete($id)
    {
        $response = $this->doctorSlotServices->deleteSlot($id);
        if ($response) {
            return response()->json([
                "status"  => "success",
                "message" => "Doctor slot retrieve successfully",
                "data"    => $response,

            ]);
        }
    }
    public function showSlotsByDoctorId($id)
    {

        $doctor     = $this->userServices->getDoctorDataById($id);
        $doctorSlot = $this->doctorSlotServices->getDoctorActiveAppointmentConfigDetails($doctor->id);
        if (isset($doctorSlot)) {
            $doctorSlot->exception_days = $doctorSlot->user->doctorExceptionDays;
            $returnedSlots  = $this->doctorSlotServices->createDoctorSlots($doctorSlot);
        } 
        else 
        {
            return response()->json([
                "status"  => false,
                "message" => "No slots available for booking.",
                "data"    => [],

            ]);
        }
        if ($returnedSlots) {
            return response()->json([
                "status"  => true,
                "message" => "Doctor slot retrieved successfully",
                "data"    => $returnedSlots,

            ]);
        }
    }
}
