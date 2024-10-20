<?php

namespace App\Http\Controllers\Api\Patient;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Services\UserServices;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\PatientDiaryService;

class PatientDashboardController extends Controller
{

  private $userServices;
  private $bookingServices;
  private $patientDiaryService;

  public function __construct(BookingServices $bookingServices, UserServices $userServices, PatientDiaryService $patientDiaryService)
  {
    $this->bookingServices = $bookingServices;
    $this->userServices = $userServices;
    $this->patientDiaryService = $patientDiaryService;
    
  }
  public function getDashBoardData()
  {
    try {

    $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate(Carbon::now(), 7);

    $diaryDetailsDayAfter = $this->getValidatePreviewsDateDiaryDetail($diaryDetails->created_at);

    $percentageChanges = [];

    $attributes = ['pulse_rate', 'oxygen_level','bp', 'avg_body_temp', 'avg_heart_beat','glucose'];

    foreach ($attributes as $attribute) {
      $currentValue = $diaryDetails->$attribute ?? null;
      $previousValue = $diaryDetailsDayAfter->$attribute ?? null;
  
      if ($currentValue !== null && $previousValue !== null && $previousValue != 0) {
          $percentageChange = (($currentValue - $previousValue) / $previousValue) * 100;
          $percentageChanges[$attribute] = round($percentageChange, 2); // Round to 2 decimal places
      } elseif ($previousValue === null && $currentValue !== null) {
          $percentageChanges[$attribute] = 100.00; // Indicating a 100% increase from no data
      } elseif ($currentValue === null && $previousValue !== null) {
          $percentageChanges[$attribute] = -100.00; // Indicating a 100% decrease to no data
      } else {
          $percentageChanges[$attribute] = 'N/A';
      }
    }
    $diaryDetails['percentage'] = $percentageChanges;
      $data =
        [
          'upcomingAppointments' =>  $this->getUpcomingAppointment() ?? '',
          'recommendedDoctors'   =>  $this->getRecommendedDoctors() ?? '',
          'popularDoctors'       =>  $this->getPopularDoctors() ?? '',
          'diaryDetails'         =>  $diaryDetails,
        ];
      if ($data) {
        return response()->json([
          "status"  => "success",
          "message" => "",
          "data"    => $data
        ]);
      }
    } catch (\Throwable $th) {
      return response()->json([
        'success' => false,
        'message' => $th->getMessage()
      ], 500);
    }
  }

  public function getValidatePreviewsDateDiaryDetail($currentDate, $diaryDetails = null)
  {
    while (!$diaryDetails) 
    {
        Log::info('Checking diary details for date: ' . $currentDate->toDateString());

            // Define your specific date
        $specificDate = Carbon::parse($currentDate); // Replace with your specific date
        $oneDayBeforeSpecificDate = $specificDate->subDay();
        $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate($oneDayBeforeSpecificDate, 7);

        if ($diaryDetails) {
            Log::info('Diary details found for date: ' . $currentDate->toDateString());
            break; // Exit the loop if a record is found
        }

        // Move to the previous day
        $currentDate = $currentDate->subDay();

        // If we have checked all days in the current month, move to the previous month
        if ($currentDate->isLastOfMonth()) {
            // Move to the last day of the previous month
            $previousMonthDate = $currentDate->startOfMonth()->subDay();
            $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate($previousMonthDate, 7);
            if ($diaryDetails) {
                break; // Exit the loop if a record is found
            }
            break;
        }
    }
    return $diaryDetails;
  }

  public function getRecommendedDoctors()
  {
    $previousBookings   =  $this->bookingServices->patientBookings(9)->first();
    $bookedDoctor       =  $previousBookings->user;
    $specialtiesArray   =  $bookedDoctor->specializations->pluck('name')->toArray();
    $recommendedDoctors =  User::whereHas('specializations', function ($query) use ($specialtiesArray) {
      $query->whereIn('name', $specialtiesArray);
    })->get();
    return $recommendedDoctors;
  }

  public function getPopularDoctors()
  {

    $allBookings   = $this->bookingServices->all();
    $doctorBookingCounts = $allBookings->groupBy('doctor_id')->map(function ($group) {
      return $group->count();
    })->sortDesc();
    $topDoctorIds   = $doctorBookingCounts->keys();
    $popularDoctors = User::whereIn('id', $topDoctorIds)
      ->get()
      ->map(function ($doctor) use ($doctorBookingCounts) {
        $doctor->booking_count = $doctorBookingCounts[$doctor->id];
        return $doctor;
      });

    return $popularDoctors;
  }


  public function getUpcomingAppointment()
  {
    return $this->bookingServices->patientUpcomingBookings(Auth::guard('api')->user()->id)->get();
  }

}
