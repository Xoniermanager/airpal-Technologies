<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use App\Helpers\CalculateExperience;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\BookingRepository;


class PatientServices
{
  private  $userRepository;
  private $bookingService;
  private $bookingRepository;
  private $patientDiaryService;

  public function __construct(UserRepository $userRepository, BookingServices $bookingService, BookingRepository $bookingRepository,PatientDiaryService $patientDiaryService)
  {
    $this->userRepository = $userRepository;
    $this->bookingService = $bookingService;
    $this->patientDiaryService = $patientDiaryService;
    $this->bookingRepository = $bookingRepository;
  }
  public function getAllPatientsList()
  {
    return $this->userRepository->where('role', 3)->get();
  }
  public function getPatientListByDoctor($doctorId)
  {
    return $this->bookingService->getAllAppointmentsByDoctorId($doctorId);
  }

  public function getPatientBookings($patientId)
  {
    return $this->bookingService->patientUpcomingBookings($patientId)->get();
  }

  public function getPatientPastBookings($patientId)
  {
    return $this->bookingRepository->where('patient_id', $patientId)
      ->where('booking_date', '<',Carbon::now())
      ->get();
  }

  public function patientHeartBeatGraph($patientId)
  {
     return $this->patientDiaryService->getAllDiaryDetailsByPatientId($patientId);
  }
}
