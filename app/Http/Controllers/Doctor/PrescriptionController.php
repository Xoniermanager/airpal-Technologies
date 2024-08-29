<?php

namespace App\Http\Controllers\Doctor;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Services\BookingServices;
use App\Http\Requests\PrescriptionRequest;
use App\Http\Services\PrescriptionService;

class PrescriptionController extends Controller
{
    public  $bookingService;
    public  $prescriptionService;

    public function __construct(BookingServices $bookingService, PrescriptionService $prescriptionService)
    {
        $this->bookingService = $bookingService;
        $this->prescriptionService = $prescriptionService;
    }
    public function index()
    {
        $allPrescriptionDetails = $this->prescriptionService->getAllPrescriptionByDoctorId(Auth::user()->id);
        $allPatientDetails = $this->bookingService->getAllAppointmentsByDoctorId(Auth::user()->id);
        return view('doctor.prescription.list', compact('allPrescriptionDetails', 'allPatientDetails'));
    }
    public function add()
    {
        $encryptedBookingId = request('bookingId');
        try {
            $bookingId = Crypt::decrypt($encryptedBookingId);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Invalid booking ID');
        }
        $allBookingDetails =  $this->bookingService->getAllAppointmentDetailsByDoctorId(Auth::user()->id);
        return view('doctor.prescription.add', compact('allBookingDetails', 'bookingId' ));
    }
    public function create(PrescriptionRequest $prescriptionDetails)
    {
        try {
            $data = $prescriptionDetails->all();
            $response = $this->prescriptionService->create($data);
            if ($response['status'] == true) {
                return redirect(route('prescription.index'))->with(['success' => " Prescription Add Successfully"]);
            } else {
                return back()->with(['error' => $response['error']]);
            }
        } catch (Exception $e) {
            return back()->with(['error' => $e->getmessage()]);
        }
    }
    public function edit($encryptPrescriptionId)
    {
        try {
            $prescriptionId = Crypt::decrypt($encryptPrescriptionId);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Invalid prescription ID');
        }
        $prescriptionDetails =  $this->prescriptionService->getPrescriptionDetailsById($prescriptionId);
        $allBookingDetails   =  $this->bookingService->getAllAppointmentDetailsByDoctorId(Auth::user()->id);
        return view('doctor.prescription.edit', compact('prescriptionDetails', 'allBookingDetails'));
    }
    public function update(PrescriptionRequest $prescriptionDetails, $prescriptionId)
    {
        try {
            $data = $prescriptionDetails->all();
            $response = $this->prescriptionService->update($data, $prescriptionId);
            if ($response['status'] == true) {
                return redirect(route('prescription.index'))->with(['success' => " Prescription Update Successfully"]);
            } else {
                return back()->with(['error' => $response['error']]);
            }
        } catch (Exception $e) {
            return back()->with(['error' => $e->getmessage()]);
        }
    }

    public function delete($prescriptionId)
    {
        try {
            $response = $this->prescriptionService->deletePrescription($prescriptionId);
            if ($response['status'] == true) {
                return response()->json([
                    'status' =>   true,
                    'data'    =>  view('doctor.prescription.all-prescription')->with(['allPrescriptionDetails' => $this->prescriptionService->getAllPrescriptionByDoctorId(Auth::user()->id)])->render()
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'error'    =>  $response['data']
                ]);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getmessage()]);
        }
    }

    public function deleteMedicine($medicineDetailsId)
    {
        try {
            $response = $this->prescriptionService->deleteMedicineDetailsById($medicineDetailsId);
            if ($response['status'] == true) {
                return response()->json(['status' => true, 'message' => "Deleted Successfully"]);
            } else {
                return response()->json(['status' => false, 'message' => 'Please Try Again']);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getmessage()]);
        }
    }
    public function searchFilterPrescriptionDetails(Request $request)
    {
        try {
            $allPrescriptionDetails = $this->prescriptionService->searchFilterPrescriptionDetails($request->all(), Auth::user()->id);
            return response()->json([
                'success' => 'Searching',
                'data'    =>  view('doctor.prescription.all-prescription', compact('allPrescriptionDetails'))->render()
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error'    =>  $e->getMessage()
            ]);
        }
    }
    public function getAllBookingDetailsByPatient(Request $request)
    {
        try {
            $allBookingDetails =  $this->bookingService->getAllBookingDetailsByDoctorAndPatientId($request->patient_id, Auth::user()->id);
            if (isset($allBookingDetails) && count($allBookingDetails) > 0) {
                $bookingDetailsHtml = '<option value="">Select Booking</option>';
                foreach ($allBookingDetails as $bookingDetails) {
                    $bookingDetailsHtml .= '<option value=' . $bookingDetails->id . '>' . date('j M Y', strtotime($bookingDetails->booking_date)) . ' & ' . date('h:i A', strtotime($bookingDetails->slot_start_time)) . ' - ' . date('h:i A', strtotime($bookingDetails->slot_start_time)) . '</option>';
                }
                $response = [
                    'status'    =>  true,
                    'data'     =>  $bookingDetailsHtml
                ];
            } else {
                $response = [
                    'status'    =>  false,
                    'data'     => '<option value="">No Booking Available</option>'
                ];
            }
            return response($response);
        } catch (Exception $e) {
            return response()->json([
                'error'    =>  $e->getMessage()
            ]);
        }
    }
}
