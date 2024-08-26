<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Http\Services\BookingServices;
use App\Models\DoctorAppointmentQueries;
use App\Http\Requests\AppointmentQueriesRequest;
use Illuminate\Contracts\Encryption\DecryptException;

class DiseaseDetailsController extends Controller
{
    private $user_services;

    private $bookingServices;
    public function __construct(UserServices $user_services, BookingServices $bookingServices,)
    {    
      $this->bookingServices = $bookingServices;
      $this->user_services   = $user_services;

    }

    public function diseaseDetails()
    { 
        $encryptedBookingId = request('booking_id');
        try {
 
            $urlSafeDecoded = urldecode($encryptedBookingId);
            $base64Decoded = base64_decode($urlSafeDecoded);
            $bookingId = Crypt::decryptString($base64Decoded);
        } catch (DecryptException $e) {
            abort(404);
        }

      $bookedAppointment = $this->bookingServices->getBookingSlotById($bookingId)->first();
      $doctorQuestions   = $this->user_services->getDoctorQuestionById($bookedAppointment->doctor_id);
      // dd($doctorQuestions );
      return view('doctor.disease-details', ['doctorQuestions' => $doctorQuestions,'booking_id'=> $bookedAppointment->id]); 
    } 
    public function storeAppointmentQueries(AppointmentQueriesRequest $request)
    { 
      $data = $request->except('_token');
      foreach ($data as $key => $value) {
          $formattedData[$key] = $value;
      }
      $payload = [
        'booking_id'  => $data['booking_id'],
        'question_and_answer' => json_encode($formattedData),
      ];
        if (DoctorAppointmentQueries::create($payload)) {
          return response()->json([
              'success' => true,
              'message' => 'Records added successfully',
          ]);
      } else {
          return response()->json([
              'success' => false,
              'message' => 'Failed to add records'
          ], 500);
      
      }
      
  }

}
