<?php

namespace App\Http\Controllers;

use App\Http\Services\BookingServices;
use App\Http\Services\UserServices;
use App\Models\User;
use App\Models\Service;
use App\Models\Language;
use Illuminate\Http\Request;

use App\Http\Services\DoctorSlotServices;
use App\Http\Services\SpecializationServices;
use DateTime;

class DoctorController extends Controller
{
  private $user_services;
  private $doctorsFilterServices;
  private $specializationServices;
  private  $doctorSlotServices;
  private $bookingServices;

  public function __construct(UserServices $user_services, SpecializationServices $specializationServices, DoctorSlotServices $doctorSlotServices, BookingServices $bookingServices)
  {
    $this->user_services = $user_services;
    $this->bookingServices = $bookingServices;
    $this->specializationServices = $specializationServices;
    $this->doctorSlotServices =  $doctorSlotServices;
  }

  public function index()
  {
    $doctors     = $this->user_services->getDoctorDataForFrontend();
    $specialties = $this->specializationServices->all();
    $specialties = $this->specializationServices->all();
    return view('frontend.doctor.index', ['doctors' =>  $doctors, 'languages' => Language::all(), 'specialties' => $specialties, 'services' => Service::all()]);
  }


  public function doctorProfile(User $user)
  {

    $doctor = $user->load('specializations', 'services', 'educations.course', 'experiences', 'workingHour.daysOfWeek', 'awards.award', 'doctorAddress.states.country');
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
    if (isset($doctorSlot)) {
      $doctorSlot->exception_days = $doctorSlot->user->doctorExceptionDays;
      $returnedSlots = $this->doctorSlotServices->makeSlots($doctorSlot);
      $returnCalendar = $this->doctorSlotServices->showCalendar($doctorSlot);
    } else {
      $returnedSlots = [];
    }
    return view('frontend.pages.appointment', ['allDaySlots' => $returnedSlots, 'doctorDetails' => $doctor, 'calender' => $returnCalendar]);
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


  public function updateCalendar(Request $request)
  {
    $data = $request->all();
    $doctor = $this->user_services->getDoctorDataById($data['doctor_id']); // id is temp will do it later 
    $doctorSlot = $this->doctorSlotServices->getSlotsByDoctorId($doctor->id);
    if (isset($doctorSlot)) {
      $doctorSlot->exception_days = $doctorSlot->user->doctorExceptionDays;
      $returnedSlots = $this->doctorSlotServices->makeSlots($doctorSlot);
      return $this->doctorSlotServices->showCalendar($doctorSlot, $data['month'], $data['year']);
    } else {
      echo "something went wrong";
    }
    // else{
    //   $returnedSlots = [];
    // }
    // return view('frontend.pages.appointment', ['allDaySlots' => $returnedSlots,'doctorDetails' => $doctor , 'calender' => $returnCalendar]);
  }





  public function getDoctorSlotsByDate(Request $request)
  {
    $data = $request->all();
    $date = $data['date'];
    $doctorSlots = $this->doctorSlotServices->getSlotsByDoctorId($data['doctor_id']);
    $returnedSlots = $this->doctorSlotServices->makeSlots($doctorSlots);

    $gettingBookedSlots = $this->bookingServices->slotDetails($data)->get();

    $startDateTime = collect($returnedSlots)->map(function ($item, $key) {
      $item['date'] = $key;
      return $item;
    })->values()->first();

    $date = $date ? $date : $startDateTime['date'];

    // Filter and prepare slots data
    $slotsData = collect($returnedSlots)
      ->filter(function ($item, $key) use ($date , $startDateTime) {
        return $key == $date;
      })
      ->map(function ($item, $key) {
        $item['date'] = $key;
        return $item;
      })
      ->values();

    // Collect booked slots for the given date
    $bookedSlotTimes = $gettingBookedSlots->filter(function ($item) use ($date) {
      return $item['booking_date'] == $date;
    })->map(function ($item) {
      return [
        'start_time' => $item['slot_start_time'],
        'end_time' => $item['slot_end_time']
      ];
    });

    // Prepare HTML for slots with indication of booked slots
    $html = '<div>';
    foreach ($slotsData as $day) {
      foreach ($day['slotsTime'] as $slot) {
        $isBooked = false;
        list($startTime, $endTime) = explode(' - ', $slot);


        $startDateTime = DateTime::createFromFormat('H:iA', $startTime);
        $endDateTime = DateTime::createFromFormat('H:iA', $endTime);

        if (!$startDateTime || !$endDateTime) {
          throw new \Exception("Failed to create DateTime object from '$startTime' or '$endTime'");
        }

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
        $html .= $isBooked ? ' disabled' : ''; // Conditionally add disabled attribute
        $html .= '" onclick="splitButton(this)">' . htmlspecialchars($slot) . '</button>';
        $html .= '<div class="additional-buttons hidden mb-2">';
        $html .= '<button id="button1" onclick="showContent(\'myDIV\')">' . htmlspecialchars(explode(' - ', $slot)[0]) . '</button>';
        $html .= '<button id="button2" onclick="showContent(\'content2\', \'' . htmlspecialchars($slot) . '\', \'' . $date . '\', \'' . $data['doctor_id'] . '\')">Next</button>';
        $html .= '</div>';
        $html .= '</div>'; // Close slot-group div

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

    return view('doctor.success', compact('bookingDate','bookingSlotTime','doctorName'));
  }
}

