<?php

namespace App\Http\Controllers;

use App\Http\Services\UserServices;
use App\Models\User;
use App\Models\Service;
use App\Models\Language;
use Illuminate\Http\Request;

use App\Http\Services\DoctorSlotServices;
use App\Http\Services\SpecializationServices;

class DoctorController extends Controller
{
  private $user_services;
  private $doctorsFilterServices;
  private $specializationServices;
  private  $doctorSlotServices;

  public function __construct(UserServices $user_services ,SpecializationServices $specializationServices,DoctorSlotServices $doctorSlotServices)
  {
       $this->user_services = $user_services;
       $this->specializationServices = $specializationServices;  
       $this->doctorSlotServices =  $doctorSlotServices;
  }

  public function index()
  {
     $doctors     = $this->user_services->getDoctorDataForFrontend();
     $specialties = $this->specializationServices->all();
     $specialties = $this->specializationServices->all();
     return view('frontend.doctor.index', ['doctors' =>  $doctors ,'languages' => Language::all(),'specialties' => $specialties,'services'=>Service::all()]);
  }


  public function doctorProfile(User $user)
  {       

      $doctor = $user->load('specializations', 'services', 'educations.course', 'experiences', 'workingHour.daysOfWeek','awards.award','doctorAddress.states.country');
      $doctorSpecializations = ($doctor->specializations)->toArray();
      $specializationNames = [];

      foreach ($doctorSpecializations as $specialization) {
          $specializationNames[] = $specialization['name'];
      }

      $topSpecializations = array_slice($specializationNames, 0, 2);
      $specializationsString = implode(', ', $topSpecializations);

      return view('frontend.doctor.doctor-profile')
          ->with('doctor', $doctor)
          ->with('specializationsString', $specializationsString);
  }


  public function appointment($id)
  {
    $doctor = $this->user_services->getDoctorDataById($id); // id is temp will do it later 
    $doctorSlot = $this->doctorSlotServices->getSlotsByDoctorId($doctor->id);
    if(isset($doctorSlot))
    {
      $doctorSlot->exception_days = $doctorSlot->user->doctorExceptionDays;
      $returnedSlots = $this->doctorSlotServices->makeSlots($doctorSlot);
      // $returnedSlots = $this->doctorSlotServices->buildCalender($doctorSlot);

    }else{
      $returnedSlots = [];
    }
    return view('frontend.pages.appointment', ['allDaySlots' => $returnedSlots,'doctorDetails' => $doctor]);
  }

  public function search(Request $request)
  {  
    $searchedItems = $this->user_services->searchInDoctors($request->all());

      if ($searchedItems) {
          return response()->json([
              'success' => 'Searching',
              'data'   =>  view("frontend.doctor.doctors_list", [
              'doctors' =>  $searchedItems
              ])->render()
          ]);
      } else {
          return response()->json(['error' => 'Something Went Wrong!! Please try again']);
      }
  }




  public function showCalendar($id)
  {
    $doctor = $this->user_services->getDoctorDataById($id); // id is temp will do it later 
    $doctorSlot = $this->doctorSlotServices->getSlotsByDoctorId($doctor->id);
    if(isset($doctorSlot))
    {
      $doctorSlot->exception_days = $doctorSlot->user->doctorExceptionDays;
      $returnedSlots = $this->doctorSlotServices->showCalendar($doctorSlot);
      // $returnedSlots = $this->doctorSlotServices->buildCalender($doctorSlot);

    }else{
      $returnedSlots = [];
    }
    return view('frontend.pages.appointment', ['allDaySlots' => $returnedSlots,'doctorDetails' => $doctor]);
  }

  
}
