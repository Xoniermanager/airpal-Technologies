<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Requests\PrescriptionRequest;
use App\Http\Services\PrescriptionService;
use Illuminate\Support\Facades\Storage;

class PrescriptionApiController extends Controller
{

    public  $bookingService;
    public  $prescriptionService;

    public function __construct(BookingServices $bookingService, PrescriptionService $prescriptionService)
    {
        $this->bookingService = $bookingService;
        $this->prescriptionService = $prescriptionService;
    }
    public function getAllPrescription()
    {
        try {
            $allPrescriptionDetails = $this->prescriptionService->getAllPrescriptionByDoctorId(Auth::guard('api')->user()->id);
            return response()->json([
                'status' => true,
                'data' => $allPrescriptionDetails,
                'message' => "Retreieved Prescriptions Successfully",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Retreieve Prescription"
            ], 500);
        }
    }
    public function createPrescription(PrescriptionRequest $prescriptionDetails)
    {
        try {
            $data = $prescriptionDetails->all();
            $response = $this->prescriptionService->create($data);
            if ($response['status'] == true) {
                return response()->json([
                    'status' => true,
                    'message' => "Add Prescription Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => $response['error'],
                    'message' => "Unable to Add Prescriptions",
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Add Prescription"
            ], 500);
        }
    }
    public function viewPrescription($prescriptionId)
    {
        try {
            $prescriptionDetails =  $this->prescriptionService->getPrescriptionDetailsById($prescriptionId);
            return response()->json([
                'status' => true,
                'data' => $prescriptionDetails,
                'message' => "Retreieved Prescriptions Successfully",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Retreieve Prescription"
            ], 500);
        }
    }
    public function updatePrescription(PrescriptionRequest $prescriptionDetails, $prescriptionId)
    {
        try {
            $data = $prescriptionDetails->all();
            $response = $this->prescriptionService->update($data, $prescriptionId);
            if ($response['status'] == true) {
                return response()->json([
                    'status' => true,
                    'message' => "Update Prescription Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => $response['error'],
                    'message' => "Unable to Update Prescriptions",
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Update Prescription"
            ], 500);
        }
    }

    public function deletePrescription($prescriptionId)
    {
        try {
            $response = $this->prescriptionService->deletePrescription($prescriptionId);
            if ($response['status'] == true) {
                return response()->json([
                    'status' => true,
                    'message' => "Deleted Prescription Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => $response['error'],
                    'message' => "Unable to Delete Prescriptions",
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json(['status' => true, 'error' => $e->getmessage()]);
        }
    }

    public function deleteMedicine($medicineDetailsId)
    {
        try {
            $response = $this->prescriptionService->deleteMedicineDetailsById($medicineDetailsId);
            if ($response['status'] == true) {
                return response()->json([
                    'status' => true,
                    'message' => "Deleted Medicine Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => $response['error'],
                    'message' => "Unable to Delete Medicine",
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getmessage()]);
        }
    }
    public function searchFilterPrescriptionDetails(Request $request)
    {
        try {
            $searchAllPrescriptionDetails = $this->prescriptionService->searchFilterPrescriptionDetails($request->all());
            return response()->json([
                'status' => true,
                'data' => $searchAllPrescriptionDetails,
                'message' => "Retreieved Prescriptions Successfully",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Retreieve Prescription"
            ], 500);
        }
    }
    public function deletePrescriptionTest($testDetailsId)
    {
        try {
            $response = $this->prescriptionService->deleteTestDetailsById($testDetailsId);
            if ($response['status'] == true) {
                return response()->json(['status' => true, 'message' => "Deleted Successfully"], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Please Try Again'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getmessage()], 500);
        }
    }

    public function downloadPdfPrescription($prescriptionId)
    {
        try {
            $pdf = $this->prescriptionService->downloadPrescriptionPdf($prescriptionId);
            $pdfContent = $pdf->output();
            $filePath = 'pdfs/prescription_document_' . time() . '.pdf';
            Storage::disk('public')->put($filePath, $pdfContent);
            $url = asset('storage/' . $filePath);
            return response()->json([
                'status' => true,
                'message' => 'Prescription PDF generated successfully.',
                'pdf_url' => $url
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Download Pdf Prescription"
            ], 500);
        }
    }
}
