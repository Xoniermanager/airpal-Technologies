<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Services\BookingServices;
use App\Http\Requests\SearchPatientAppointments;
use App\Http\Services\PrescriptionService;

class PatientAppointmentsController extends Controller
{
    private $bookingServices;
    private $prescriptionService;
    public function __construct(BookingServices $bookingServices, PrescriptionService $prescriptionService)
    {
        $this->bookingServices = $bookingServices;
        $this->prescriptionService = $prescriptionService;
    }
    public function patientAppointments()
    {
        $patientAppointments = $this->bookingServices->patientBookings(Auth::user()->id)->with('prescription')->paginate(9);
        $allAppointmentCounter = $this->bookingServices->getAllAppointmentPatientCounter(Auth::id());
        if ($patientAppointments) {
            return view('patients.appointments.patient-appointments', [
                'appointments' => $patientAppointments,
                'counters'     => $allAppointmentCounter,
            ]);
        }
    }

    public function patientAppointmentFilter(SearchPatientAppointments $searchPatientAppointments)
    {

        $filterParams = $searchPatientAppointments->validated();
        $filtered  = $this->bookingServices->searchDoctorAppointments($filterParams);
        $gridHtml = view("patients.appointments.grid-view", [
            'appointments' =>  $filtered
        ])->render();

        $listHtml = view("patients.appointments.list-view", [
            'appointments' =>  $filtered
        ])->render();

        return response()->json([
            'success' => 'Searching',
            'data'   =>  [
                'list'  =>  $listHtml,
                'grid'  =>  $gridHtml
            ]
        ]);
    }

    public function viewPrescription($encryptPrescriptionId)
    {
        try {
            $prescriptionId = Crypt::decrypt($encryptPrescriptionId);
            $prescriptionDetails =  $this->prescriptionService->getPrescriptionDetailsById($prescriptionId);
            $webView = true;
            $active = "active";
            return view('patients.prescription.view', compact('prescriptionDetails', 'webView','active'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Invalid prescription ID');
        }
    }
}
