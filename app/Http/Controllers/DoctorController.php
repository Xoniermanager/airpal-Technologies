<?php

namespace App\Http\Controllers;

use App\Http\Services\BookingServices;
use App\Http\Services\DoctorReviewService;
use App\Http\Services\UserServices;
use App\Models\User;
use App\Models\Service;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\DoctorAppointmentConfigService;
use App\Http\Services\SpecializationServices;
use DateTime;

class DoctorController extends Controller
{
  private $user_services;
  private $doctorsFilterServices;
  private $specializationServices;
  private $doctorSlotServices;
  private $bookingServices;

  private $doctorReviewService;

  public function __construct(UserServices $user_services, SpecializationServices $specializationServices, DoctorAppointmentConfigService $doctorSlotServices, BookingServices $bookingServices, DoctorReviewService $doctorReviewService)
  {
    $this->user_services = $user_services;
    $this->bookingServices = $bookingServices;
    $this->specializationServices = $specializationServices;
    $this->doctorSlotServices =  $doctorSlotServices;
    $this->doctorReviewService =  $doctorReviewService;
  }

  public function index()
  {
    $doctors     = $this->user_services->getDoctorDataForFrontend();
    $specialties = $this->specializationServices->all();
    $specialties = $this->specializationServices->all();
    $allRatingStars = $this->doctorReviewService->getAllRatingGroupByRatingNumber();
    return view('frontend.doctor.search-doctor', ['doctors' =>  $doctors, 'languages' => Language::all(), 'specialties' => $specialties, 'services' => Service::all(), 'allRatingStars' => $allRatingStars]);
  }


  public function doctorProfile(User $user)
  {

    $doctor = $user->load('specializations', 'services', 'educations.course', 'experiences', 'workingHour.daysOfWeek', 'awards.award', 'doctorAddress.states.country', 'doctorReview.patient');
    $doctorSpecializations = ($doctor->specializations)->toArray();
    $ratingButton = false;
    if (isset($doctor->doctorReview) && count($doctor->doctorReview) > 0) {
      $ratingButton = true;
    }
    $rating =  $doctor->doctorReview ? 'true' : 'false';
    $specializationNames = [];

    foreach ($doctorSpecializations as $specialization) {
      $specializationNames[] = $specialization['name'];
    }

    $topSpecializations = array_slice($specializationNames, 0, 2);
    $specializationsString = implode(', ', $topSpecializations);
    return view('frontend.doctor.doctor-profile')
      ->with('doctor', $doctor)
      ->with('ratingButton', $ratingButton)
      ->with('specializationsString', $specializationsString)
      ->with('allReviewDetails', $this->doctorReviewService->getAllReviewByDoctorId($user->id));
  }

  public function appointment($id)
  {
    $doctor = $this->user_services->getDoctorDataById($id);
    $doctorSlotConfigDetails = $this->doctorSlotServices->getDoctorSlotConfiguration($doctor->id);
    if (isset($doctorSlotConfigDetails)) {
      $doctorSlotConfigDetails->exception_days = $doctorSlotConfigDetails->user->doctorExceptionDays;
      $returnCalendar = $this->doctorSlotServices->CreateDoctorSlotCalendar($doctorSlotConfigDetails);
    } else {
      $returnedSlots = [];
    }
    return view('frontend.pages.appointment', ['doctorDetails' => $doctor, 'calender' => $returnCalendar]);
  }

  public function search(Request $request)
  {
    Validator::make($request->all(), [
      'gender'      =>  'sometimes|in:male,female',
      'languages'   =>  'sometimes|exists:languages,id',
      'experience'  =>  'sometimes|in:"1-5","5-10"',
      'specialty'   =>  'sometimes|exists:specializations,id',
      'services'    =>  'sometimes|exists:services,id',
      'availability'  =>  'sometimes|integer|in:1,2,7,30',
      'rating'      =>  'sometimes|integer|between:1,5'
    ]);

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


  public function updateCalendar(Request $request)
  {
    $data = $request->all();
    $doctor = $this->user_services->getDoctorDataById($data['doctor_id']);
    $doctorSlot = $this->doctorSlotServices->getDoctorSlotConfiguration($doctor->id);
    if (isset($doctorSlot)) {
      $doctorSlot->exception_days = $doctorSlot->user->doctorExceptionDays;
      // $returnedSlots = $this->doctorSlotServices->createDoctorSlots($doctorSlot);
      return $this->doctorSlotServices->CreateDoctorSlotCalendar($doctorSlot, $data['month'], $data['year']);
    } else {
      echo "something went wrong";
    }
  }


  public function getDoctorSlotsByDate(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'date'        =>  'required|date',
      'doctor_id'   =>  'required|integer|exists:users,id,role,2'
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }
    $requestPayload = $validator->validated();

    $date = $requestPayload['date'];

    $doctorSlotConfiguration   = $this->doctorSlotServices->getDoctorSlotConfiguration($requestPayload['doctor_id']);
    $returnedSlots             = $this->doctorSlotServices->createDoctorSlots($doctorSlotConfiguration);
    $gettingBookedSlots = $this->bookingServices->slotDetails($requestPayload)->get();

    $startDateTime = collect($returnedSlots)->map(function ($item, $key) use ($date) {
      $item['date'] = $date;
      return $item;
    })->values()->first();


    $date = $date ? $date : $startDateTime['date'];

    // Collect booked slots for the given date
    $bookedSlotTimes = $gettingBookedSlots->filter(function ($item) use ($date) {
      return $item['booking_date'] == $date;
    })->map(function ($item) {
      return [
        'start_time' => $item['slot_start_time'],
        'end_time' => $item['slot_end_time']
      ];
    });
    // dd($bookedSlotTimes);

    // Prepare HTML for slots with indication of booked slots
    $html = '<div>';
    // foreach ($startDateTime as $day) {
    foreach ($startDateTime['slotsTime'] as $slot) {
      $isBooked = false;
      list($startTime, $endTime) = explode(' - ', $slot);

      $startDateTime = DateTime::createFromFormat('H:i', $startTime);
      $endDateTime = DateTime::createFromFormat('H:i', $endTime);

      if (!$startDateTime || !$endDateTime) {
        throw new \Exception("Failed to create DateTime object from '$startTime' or '$endTime'");
      }
      if (isset($bookedSlotTimes)) {

        // Check if slot is booked
        foreach ($bookedSlotTimes as $bookedSlot) {
          $bookedStartTime = DateTime::createFromFormat('H:i:s', $bookedSlot['start_time']);
          $bookedEndTime = DateTime::createFromFormat('H:i:s', $bookedSlot['end_time']);

          // Check for overlapping times
          if ($startDateTime < $bookedEndTime && $endDateTime > $bookedStartTime) {
            $isBooked = true;
            break;
          }
        }

        // Add booked class if the slot is booked
        $slotClass = $isBooked ? ' booked' : '';

        $html .= '<div class="slot-group">';
        $html .= '<button class="btn btn-outline-primary mb-3 w-100' . $slotClass;
        $html .= $isBooked ? ' disabled' : '';
        $html .= '" onclick="splitButton(this)">' . htmlspecialchars($slot) . '</button>';
        $html .= '<div class="additional-buttons hidden mb-2">';
        $html .= '<button id="button1" onclick="showContent(\'myDIV\')">' . htmlspecialchars(explode(' - ', $slot)[0]) . '</button>';
        $html .= '<button id="button2" onclick="showContent(\'content2\', \'' . htmlspecialchars($slot) . '\', \'' . $date . '\', \'' . $requestPayload['doctor_id'] . '\')">Next</button>';
        $html .= '</div>';
        $html .= '</div>';
      }
    }

    $html .= '</div>';

    return response()->json(['html' => $html]);
  }

  public function success(Request $request)
  {
    $bookingDate     = session('booking_date') ?? '';
    $bookingSlotTime = session('bookingSlotTime') ?? '';
    $doctorName      = $this->user_services->getDoctorDataById(session('doctorId'))->fullName ?? '';

    return view('doctor.success', compact('bookingDate', 'bookingSlotTime', 'doctorName'));
  }
}
