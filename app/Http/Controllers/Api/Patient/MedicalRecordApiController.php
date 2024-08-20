<?php

namespace App\Http\Controllers\Api\Patient;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\BookingServices;
use App\Http\Requests\MedicalRecordRequest;
use App\Http\Services\MedicalRecordService;

class MedicalRecordApiController extends Controller
{
    public $bookingService;

    public $medicalRecordService;

    public function __construct(BookingServices $bookingService, MedicalRecordService $medicalRecordService)
    {
        $this->bookingService = $bookingService;
        $this->medicalRecordService = $medicalRecordService;
    }
    public function medicalRecordsList()
    {
        try {
            $allMedicalRecord = $this->medicalRecordService->getMedicalRecordByPatientId(Auth()->guard('api')->user()->id);
            return response()->json([
                "status" => true,
                'data'    => $allMedicalRecord
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" =>  $e->getMessage(),
            ]);
        }
    }
    public function createMedicalRecord(MedicalRecordRequest $request)
    {
        try {
            $data = $request->all();
            $data['patient_id'] = Auth()->guard('api')->user()->id;
            $response = $this->medicalRecordService->createDetails($data);
            return response()->json([
                "status" => true,
                'message' => 'Add Medical Record',
                'data'    => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" =>  $e->getMessage(),
            ]);
        }
    }

    public function editMedicalRecord($id)
    {
        try {
            $medicalRecordDetail = $this->medicalRecordService->getMedicalRecordById($id);
            return response()->json([
                "status" => true,
                'message' => 'Retrieved successfully',
                'data'    => $medicalRecordDetail
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "message" =>  $e->getMessage(),
            ], 500);
        }
    }

    public function updateMedicalRecord(MedicalRecordRequest $request, $id)
    {
        try {
            $data = $request->all();
            $this->medicalRecordService->updateDetails($data, $id);
            return response()->json([
                "status" => true,
                'message' => 'Updated successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function deleteMedicalRecord($id)
    {
        try {
            $response = $this->medicalRecordService->deleteDetails($id);
            return response()->json([
                "status" => true,
                'message' => 'Deleted successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Delete"
            ], 500);
        }
    }

    public function searchFilterMedicalRecord(Request $request)
    {
        try {
            $allMedicalRecord = $this->medicalRecordService->searchFilterMedicalRecord($request->all(), Auth()->guard('api')->user()->id);
            return response()->json([
                "status" => true,
                'message' => 'Searching',
                'data'    => $allMedicalRecord
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Find"
            ], 500);
        }
    }

    public function getBookingDetailsByPatientId()
    {
        try {
            $allBookingDetails =  $this->bookingService->patientBookings(Auth()->guard('api')->user()->id)->with('doctor')->get();
            $finalPayload = [];
            foreach ($allBookingDetails as $bookingDetails) {
                $finalPayload[] =
                    [
                        'id' => $bookingDetails->id,
                        'name' => $bookingDetails->booking_date . ' && ' . $bookingDetails->slot_start_time . ' - ' . $bookingDetails->slot_end_time,
                        'note' => $bookingDetails->note,
                        'doctor_details' => $bookingDetails->doctor,
                    ];
            }
            return response()->json([
                "status" => true,
                'data'    => $finalPayload
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Get Booking Details"
            ], 500);
        }
    }
}
