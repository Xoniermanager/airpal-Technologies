<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use App\Helpers\CalculateExperience;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\UserRepository;


class PatientServices
{
  private  $userRepository;
  private $bookingService;

  public function __construct(UserRepository $userRepository, BookingServices $bookingService)
  {
    $this->userRepository = $userRepository;
    $this->bookingService = $bookingService;
  }
  public function getAllPatientsList()
  {
     return $this->userRepository->where('role',3)->get();
  }
  public function getPatientListByDoctor($doctorId)
  {
     return $this->bookingService->getAllAppointmentsByDoctorId($doctorId);
  }


  
}