<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Service;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Jobs\GenerateAllInvoices;
use App\Http\Services\UserServices;
use App\Http\Services\DoctorService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Services\BookingServices;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SearchDoctorRequest;
use App\Http\Services\DoctorReviewService;
use App\Http\Services\FavoriteDoctorServices;
use App\Http\Services\SpecializationServices;
use App\Http\Services\DoctorAppointmentConfigService;

class FrontendDoctorController extends Controller
{
  private $user_services;
  private $specializationServices;
  private $doctorSlotServices;
  private $bookingServices;

  private $doctorService;

  private $doctorReviewService;
  private $favoriteDoctorServices;

  public function __construct(
    UserServices $user_services,
    SpecializationServices $specializationServices,
    DoctorAppointmentConfigService $doctorSlotServices,
    BookingServices $bookingServices,
    DoctorReviewService $doctorReviewService,
    DoctorService $doctorService,
    FavoriteDoctorServices $favoriteDoctorServices
  ) {
    $this->user_services = $user_services;
    $this->bookingServices = $bookingServices;
    $this->specializationServices = $specializationServices;
    $this->doctorSlotServices =  $doctorSlotServices;
    $this->doctorReviewService =  $doctorReviewService;
    $this->doctorService = $doctorService;
    $this->favoriteDoctorServices = $favoriteDoctorServices;
  }

  public function getDoctorsListWithFilters()
  {
    $doctors = $this->user_services->getDoctorDataForFrontend();
    $specialties = $this->specializationServices->all();
    $allRatingStars = $this->doctorService->getDoctorCountsGroupedByRatings();

    // Check if the user is authenticated
    if (Auth::check()) 
    {
      $patientId = Auth::user()->id;
      $favoriteDoctorsList = $this->favoriteDoctorServices->getAllFavoriteDoctors($patientId)->pluck('doctor_id')->toArray();
    }
    else
    {
      $favoriteDoctorsList = []; // No favorite doctors if not logged in
    }

    $ratingsWithCounter = [];
    for ($i = 1; $i <= 5; $i++) {
      $ratingsWithCounter[$i] = array_sum($allRatingStars->whereBetween('allover_rating', [$i - 0.5, $i])->pluck('total_doctors')->toArray());
    }

    return view('website.doctor.search-doctor', [
      'doctors' => $doctors,
      'languages' => Language::all(),
      'specialties' => $specialties,
      'services' => Service::all(),
      'ratingsWithCounter' => $ratingsWithCounter,
      'favoriteDoctorsList' => $favoriteDoctorsList
    ]);
  }



  public function doctorProfile(User $encryptedId)
  {
    $encryptedId = request('user');
    try {
      $decryptedId = Crypt::decrypt($encryptedId);
    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
      abort(404, 'Invalid doctor ID');
    }

    $user = User::findOrFail($decryptedId);
    $doctor = $user->load('specializations', 'services', 'educations.course', 'experiences', 'workingHour.daysOfWeek', 'awards.award', 'doctorAddress.states.country', 'doctorReview.patient');

    // Using custom global helper method check if booking are open for current doctor
    $bookingOpen = checkBookingAvailable($doctor->id);

    return view('website.doctor.doctor-profile')
      ->with('doctor', $doctor)
      ->with('bookingOpen', $bookingOpen)
      ->with('allReviewDetails', $this->doctorReviewService->getAllReviewByDoctorId($user->id));
  }

  public function appointment($encryptedId)
  {
    try {
      $id = Crypt::decrypt($encryptedId);
    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
      abort(404, 'Invalid doctor ID');
    }

    $doctor = $this->user_services->getDoctorDataById($id);

    $doctorSlotConfigDetails = $this->doctorSlotServices->getDoctorActiveAppointmentConfigDetails($doctor->id);

    $returnCalendar = '';
    if (isset($doctorSlotConfigDetails)) 
    {
      $returnCalendar = $this->doctorSlotServices->CreateDoctorSlotCalendar($doctorSlotConfigDetails);
    }

    return view('website.pages.appointment', ['doctorDetails' => $doctor,'calender' => $returnCalendar, 'booking_price' =>  '10 USD']);
  }

  public function search(SearchDoctorRequest $request)
  {
    $specialties = $this->specializationServices->all();
    $allRatingStars = $this->doctorService->getDoctorCountsGroupedByRatings();

    // Check if the user is authenticated
    if (Auth::check()) {
      $patientId = Auth::user()->id;
      $favoriteDoctorsList = $this->favoriteDoctorServices->getAllFavoriteDoctors($patientId)->pluck('doctor_id')->toArray();
    } else {
      $favoriteDoctorsList = []; // No favorite doctors if not logged in
    }

    $ratingsWithCounter = [];
    for ($i = 1; $i <= 5; $i++) {
      $ratingsWithCounter[$i] = array_sum($allRatingStars->whereBetween('allover_rating', [$i - 0.5, $i])->pluck('total_doctors')->toArray());
    }


    $searchedItems = $this->user_services->searchInDoctors($request->validated());

    if ($searchedItems) {
      return response()->json([
        'success' => 'Searching',
        'doctorsCount' =>  $searchedItems['doctorsCount'],
        'data'   =>  view("website.doctor.doctors_list", [
          'doctors' =>  $searchedItems['data'],
          'languages' => Language::all(),
          'specialties' => $specialties,
          'services' => Service::all(),
          'ratingsWithCounter' => $ratingsWithCounter,
          'favoriteDoctorsList' => $favoriteDoctorsList
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
    $doctorSlot = $this->doctorSlotServices->getDoctorActiveAppointmentConfigDetails($doctor->id);
    if (isset($doctorSlot)) 
    {
      $doctorSlot->exception_days = $doctorSlot->user->doctorExceptionDays;
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

    if ($validator->fails()) 
    {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $requestPayload = $validator->validated();

    $slotInfo = $this->doctorSlotServices->createSlotsForSelectedDoctorAndDate($requestPayload);

    return response()->json([
      'html'        =>  $slotInfo['slots_html'],
      'slot_status' =>  $slotInfo['slot_status']
    ]);
  }

  public function success(Request $request)
  {
    $bookingDate     = session('booking_date') ?? '';
    $bookingSlotTime = session('bookingSlotTime') ?? '';
    $doctorName      = $this->user_services->getDoctorDataById(session('doctorId'))->fullName ?? '';

    return view('doctor.success', compact('bookingDate', 'bookingSlotTime', 'doctorName'));
  }


  public function retrieveLastBookingDate(Request $request)
  {

    $latestBookings = $this->bookingServices->retrieveLastBookingDate(Auth::id());
    $slotConfig     = $this->doctorSlotServices->getSlotConfig(Auth::id());

    switch ($slotConfig->status) {
      case '0':
        // Code for when $slotConfig is '0' or closed
        break;

      case '1':
        // Code for when $slotConfig is '1' or active 
        $this->doctorSlotServices->createSlot($request->all());
        break;

      case '2':
        // Here checking if config status is 2, that means future applied update
        $this->doctorSlotServices->updateSlot($request->all());
        break;
      default:
        // Code for any other value of $slotConfig
        break;
    }


    dd($latestBookings);
  }


  public function generateAllInvoices(Request $request)
  {
    GenerateAllInvoices::dispatch();
  }

  public function choose()
  {
    return view('website.pages.choose');
  }

  public function doctorRegistrationIndex()
  {
    return view('website.pages.doctor-register');
  }



  // public function DoctorList() {}


  // public function SliderDesign()
  // {

  //   echo '<section class="our-doctors-section">';
  //   echo '    <div class="container">';
  //   echo '        <div class="row">';
  //   echo '            <div class="col-md-6 aos" data-aos="fade-up">';
  //   echo '                <div class="section-heading">';
  //   echo '                    <h2>Top Doctors</h2>';
  //   echo '                    <p>Access to expert physicians and surgeons, advanced technologies and top-quality surgery facilities right here.</p>';
  //   echo '                </div>';
  //   echo '            </div>';
  //   echo '            <div class="col-md-6 text-end aos" data-aos="fade-up">';
  //   echo '                <div class="owl-nav slide-nav-2 text-end nav-control"></div>';
  //   echo '            </div>';
  //   echo '        </div>';
  //   echo '        <div class="owl-carousel our-doctors owl-theme aos" data-aos="fade-up">';



  //   echo '            <div class="item">';
  //   echo '                <div class="our-doctors-card">';
  //   echo '                    <div class="doctors-header">';
  //   echo '                        <a href="#"><img src="' . URL::asset('assets/img/doctors/doctor-01.jpg') . '" alt="Ruby Perrin" class="img-fluid"></a>';
  //   echo '                    </div>';
  //   echo '                    <div class="doctors-body">';
  //   echo '                        <div class="rating">';
  //   echo '                            <i class="fas fa-star filled"></i>';
  //   echo '                            <i class="fas fa-star filled"></i>';
  //   echo '                            <i class="fas fa-star filled"></i>';
  //   echo '                            <i class="fas fa-star filled"></i>';
  //   echo '                            <i class="fas fa-star filled"></i>';
  //   echo '                            <span class="d-inline-block average-ratings">3.5</span>';
  //   echo '                        </div>';
  //   echo '                        <a href="#">';
  //   echo '                            <h4>Dr. Ruby Perrin</h4>';
  //   echo '                        </a>';
  //   echo '                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>';
  //   echo '                        <div class="location d-flex">';
  //   echo '                            <p><i class="fas fa-map-marker-alt"></i> Georgia, USA</p>';
  //   echo '                            <p class="ms-auto"><i class="fas fa-user-md"></i> 450 Consultations</p>';
  //   echo '                        </div>';
  //   echo '                        <div class="row row-sm">';
  //   echo '                            <div class="col-6">';
  //   echo '                                <a href="#" class="btn view-btn" tabindex="0">View Profile</a>';
  //   echo '                            </div>';
  //   echo '                            <div class="col-6">';
  //   echo '                                <a href="#" class="btn book-btn" tabindex="0">Book Now</a>';
  //   echo '                            </div>';
  //   echo '                        </div>';
  //   echo '                    </div>';
  //   echo '                </div>';
  //   echo '            </div>';


  //   echo '        </div>';
  //   echo '    </div>';
  //   echo '</section>';
  // }
}
