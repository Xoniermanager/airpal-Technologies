<?php

namespace App\Http\Controllers\Patient;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\MedicalRecordService;
use App\Http\Requests\MedicalRecordRequest;

class MedicalRecordController extends Controller
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
        $allMedicalRecord = $this->medicalRecordService->getMedicalRecordByPatientId(Auth::user()->id);
        return view('patients.medical-records.list', compact('allMedicalRecord'));
    }

    public function addMedicalRecord()
    {
        $allBookingDetails =  $this->bookingService->patientBookings(Auth::user()->id)->get();
        return view('patients.medical-records.add', compact('allBookingDetails'));
    }

    public function createMedicalRecord(MedicalRecordRequest $request)
    {
        try {
            $data = $request->all();
            $data['patient_id'] = Auth::user()->id;
            $response = $this->medicalRecordService->createDetails($data);
            if ($response['status'] == true) {
                return redirect(route('patient.medical-records.index'))->with(['success' => "Your Medical Record Has Been Created"]);
            } else {
                return back()->with(['error' => $response['data']]);
            }
        } catch (Exception $e) {
            return back()->with(['error' => $e->getmessage()]);
        }
    }

    public function editMedicalRecord($id)
    {
        $medicalRecordDetail = $this->medicalRecordService->getMedicalRecordById($id);
        $allBookingDetails =  $this->bookingService->patientBookings(Auth::user()->id)->get();
        return view('patients.medical-records.edit', compact('medicalRecordDetail', 'allBookingDetails'));
    }

    public function updateMedicalRecord(MedicalRecordRequest $request, $id)
    {
        try {
            $data = $request->all();
            $response = $this->medicalRecordService->updateDetails($data, $id);
            if ($response['status'] == true) {
                return redirect(route('patient.medical-records.index'))->with(['success' => "Your Medical Record Has Been Updated"]);
            } else {
                return back()->with(['error' => $response['data']]);
            }
        } catch (Exception $e) {
            return back()->with(['error' => $e->getmessage()]);
        }
    }

    public function deleteMedicalRecord($id)
    {
        try {
            $response = $this->medicalRecordService->deleteDetails($id);
            if ($response['status'] == true) {
                return back()->with(['success' => "Your Medical Record Has Been Deleted"]);
            } else {
                return back()->with(['error' => $response['data']]);
            }
        } catch (Exception $e) {
            return back()->with(['error' => $e->getmessage()]);
        }
    }

    public function getBookingDetails($bookingId)
    {
        $bookingDetails = $this->bookingService->appointmentsById($bookingId)->first();
        $html = '';
        $html .= '<div class="appointment-wrap appointment-grid-wrap"><p> <b>Booking Details </b></p><ul><li><div class="appointment-grid-head"><div class="patinet-information">';
        $html .= '<img class="img-fluid" alt="" src="' . $bookingDetails->doctor->image_url . '">';
        $html .= '<div class="patient-info"><h6><a href=>' . $bookingDetails->doctor->display_name . '</a></h6><p class="visit">General Visit</p></div></div></div></li>';
        $html .= '<li class="appointment-info"><p><i class="fa-solid fa-calendar-check"></i>' . date('j M Y', strtotime($bookingDetails->booking_date)) . '</p>';
        $html .= '<p><i class="fa-solid fa-clock"></i>' . date('h:i A', strtotime($bookingDetails->slot_start_time)) . ' - ' . date('h:i A', strtotime($bookingDetails->slot_start_time)) . '</p>';
        $html .= '<p> <b> Note:</b> '  . $bookingDetails->note . '</p></li></ul></div>';
        return response($html);
    }

    public function searchFilterMedicalRecord(Request $request)
    {
        try {
            $allMedicalRecord = $this->medicalRecordService->searchFilterMedicalRecord($request->all(), Auth::user()->id);
            return response()->json([
                'success' => 'Searching',
                'data'    =>  view("patients.medical-records.all-medical-record", compact('allMedicalRecord'))->render()
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error'    =>  $e->getMessage()
            ]);
        }
    }
}
