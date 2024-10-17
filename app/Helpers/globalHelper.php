<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use App\Models\SiteConfig;
use App\Models\Testimonial;
use App\Models\BookingSlots;
use App\Models\PaypalConfig;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use function Laravel\Prompts\textarea;
use App\Models\DoctorAppointmentConfig;
use Illuminate\Support\Facades\Storage;

function getRatingHtml($value)
{
    $html = '';
    $star_1 = '"fa fa-star"';
    $star_2 = '"fa fa-star"';
    $star_3 = '"fa fa-star"';
    $star_4 = '"fa fa-star"';
    $star_5 = '"fa fa-star"';
    if ($value >= '0.5') {
        $star_1 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '1') {
        $star_1 = '"fa fa-star text-warning"';
    }

    if ($value >= '1.5') {
        $star_2 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '2') {
        $star_2 = '"fa fa-star text-warning"';
    }

    if ($value >= '2.5') {
        $star_3 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '3') {
        $star_3 = '"fa fa-star text-warning"';
    }

    if ($value >= '3.5') {
        $star_4 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '4') {
        $star_4 = '"fa fa-star text-warning"';
    }

    if ($value >= '4.5') {
        $star_5 = '"fa fa-star-half text-warning"';
    }

    if ($value > '4.5') {
        $star_5 = '"fa fa-star text-warning"';
    }
    $html .=       "<i class=$star_1></i>
                    <i class=$star_2></i>
                    <i class=$star_3></i>
                    <i class=$star_4></i>
                    <i class=$star_5></i>";
    return $html;
}

function uploadingImageorFile($file, String $path, $namePrefix = '')
{
    if(!empty($namePrefix))
    {
        $namePrefix = $namePrefix . '-';
    }

    $image  = $namePrefix . time() . '.' . $file->getClientOriginalExtension();

    $path = $path . '/' . $image;
    Storage::disk('public')->put($path, file_get_contents($file));
    return  $path;
}
function unlinkFileOrImage($file)
{
    if (file_exists(storage_path('app/public/') . $file))
    {
        unlink(storage_path('app/public/') . $file);
    }
    return true;
}



function site($configName = '')
{
    $configs = SiteConfig::where('name', $configName)->first();

    if ($configs) {
        if ($configs->name == 'website_logo' || $configs->name == 'website_favicon') {

            $configs->value = url('storage/' . $configs->value);
        }
        return $configs->value;
    }
    return;
}



function getContentInput($value='',$levelName = "Title", $name='title', $classList=array(), $idsList=array())
{
    $divClasses = '';
    $labelClasses = '';
    $inputClasses = '';
    $divId = (isset($idsList['div']) && is_string($idsList['div'])) ? $idsList['div'] : '';
    $labelId = (isset($idsList['label']) && is_string($idsList['label'])) ? $idsList['label'] : '';
    $inputId = (isset($idsList['input']) && is_string($idsList['input'])) ? $idsList['input'] : '';

    if(isset($classList['div']) && count($classList['div']) > 0)
    {
        $divClasses = implode(' ',$classList['div']);
    }

    if(isset($classList['label']) && count($classList['label']) > 0)
    {
        $divClasses = implode(' ',$classList['label']);
    }

    if(isset($classList['input']) && count($classList['input']) > 0)
    {
        $divClasses = implode(' ',$classList['input']);
    }

    return '<div class="form-wrap '. $divClasses .'" id="'. $divId .'">
                <label class="col-form-label '. $labelClasses .'" id="'. $labelId .'">'. $levelName .' <span class="text-danger">*</span></label>
                <textarea  id="'. $inputId .'" class="form-control '. $inputClasses .'" name='. $name .'
                    value="'. $value .'"  style="height: 150px;">'. $value .'</textarea>
                <span class="text-danger" id="'. $name .'_error"></span>
            </div>';
}

// Create html for section title
function getTextInput($value = '', $levelName = "Title", $name = 'title', $classList = array(), $idsList = array())
{
    $divClasses = '';
    $labelClasses = '';
    $inputClasses = '';
    $divId = (isset($idsList['div']) && is_string($idsList['div'])) ? $idsList['div'] : '';
    $labelId = (isset($idsList['label']) && is_string($idsList['label'])) ? $idsList['label'] : '';
    $inputId = (isset($idsList['input']) && is_string($idsList['input'])) ? $idsList['input'] : '';

    if (isset($classList['div']) && count($classList['div']) > 0) {
        $divClasses = implode(' ', $classList['div']);
    }

    if (isset($classList['label']) && count($classList['label']) > 0) {
        $divClasses = implode(' ', $classList['label']);
    }

    if (isset($classList['input']) && count($classList['input']) > 0) {
        $divClasses = implode(' ', $classList['input']);
    }

    return '<div class="form-wrap ' . $divClasses . '" id="' . $divId . '">
                <label class="col-form-label ' . $labelClasses . '" id="' . $labelId . '">' . $levelName . ' <span class="text-danger">*</span></label>
                <input id="' . $inputId . '" type="text" class="form-control ' . $inputClasses . '" name=' . $name . '
                    value="' . $value . '">
                <span class="text-danger" id="' . $name . '_error"></span>
            </div>';
}





function getButtonInputs($value = '', $name = '', $classList = array(), $idsList = array())
{
    $divClasses = '';
    $inputClasses = '';

    $divId = (isset($idsList['div']) && is_string($idsList['div'])) ? $idsList['div'] : '';
    $inputId = (isset($idsList['input']) && is_string($idsList['input'])) ? $idsList['input'] : '';

    if (isset($classList['div']) && count($classList['div']) > 0) {
        $divClasses = implode(' ', $classList['div']);
    }

    if (isset($classList['input']) && count($classList['input']) > 0) {
        $divClasses = implode(' ', $classList['input']);
    }
    return  '<div class="modal-btn text-end ' . $divClasses . '">

            <label class="col-form-label">Button Text<span class="text-danger">*</span></label>
            <input id="' . $inputId . '" type="text" class="form-control ' . $inputClasses . '" name="' . $name . '"
            value="' . $value . '">

            <label class="col-form-label">Button Link<span class="text-danger">*</span></label>
            <input id="' . $inputId . '" type="text" class="form-control ' . $inputClasses . '" name="' . $name . '"
            value="' . $value . '">
            <button type="submit" class="btn btn-primary prime-btn ' . $inputClasses . '" id="' . $inputId . '">' . $value . '</button>
            </div>';
}

function getSectionTextArea($value = '', $name = 'title', $classList = array(), $idsList = array(), $levelName = "Content",)
{
    $divClasses = '';
    $labelClasses = '';
    $inputClasses = '';
    $divId = (isset($idsList['div']) && is_string($idsList['div'])) ? $idsList['div'] : '';
    $labelId = (isset($idsList['label']) && is_string($idsList['label'])) ? $idsList['label'] : '';
    $inputId = (isset($idsList['input']) && is_string($idsList['input'])) ? $idsList['input'] : '';

    if (isset($classList['div']) && count($classList['div']) > 0) {
        $divClasses = implode(' ', $classList['div']);
    }

    if (isset($classList['label']) && count($classList['label']) > 0) {
        $divClasses = implode(' ', $classList['label']);
    }

    if (isset($classList['input']) && count($classList['input']) > 0) {
        $divClasses = implode(' ', $classList['input']);
    }

    return '<div class="form-wrap ' . $divClasses . '" id="' . $divId . '">
                <label class="col-form-label ' . $labelClasses . '" id="' . $labelId . '">' . $levelName . '  <span class="text-danger">*</span></label>
                <textarea id="' . $inputId . '" type="text" class="form-control ' . $inputClasses . '" name="' . $name . '"
                    value="' . $value . '" style="height: 150px;">' . $value . '</textarea>
                <span class="text-danger" id="' . $name . '_error"></span>
            </div>';
}


function getImageInput($value = '', $name = '', $classList = array(), $idsList = array())
{
    if (empty($value)) {
        $value = asset("assets/img/doctors-dashboard/no-apt-3.png");
    }

    $mainDivClasses = '';
    $innerDivClasses = '';
    $inputClasses = '';

    if (isset($classList['main_div']) && count($classList['main_div']) > 0) {
        $mainDivClasses = implode(' ', $classList['main_div']);
    }

    if (isset($classList['inner_div']) && count($classList['inner_div']) > 0) {
        $innerDivClasses = implode(' ', $classList['inner_div']);
    }

    if (isset($classList['input']) && count($classList['input']) > 0) {
        $inputClasses = implode(' ', $classList['input']);
    }

    $mainDivId = (isset($idsList['mainDiv']) && is_string($idsList['mainDiv'])) ? $idsList['mainDiv'] : '';
    $innerDivId = (isset($idsList['innerDiv']) && is_string($idsList['innerDiv'])) ? $idsList['innerDiv'] : '';

    $inputId = (isset($idsList['input']) && is_string($idsList['input'])) ? $idsList['input'] : '';
    $previewId = (isset($idsList['preview']) && is_string($idsList['preview'])) ? $idsList['preview'] : '';

    return '<div class="avatar-upload-two">
            <div class="avatar-edit">
                <input type="file" class="imageUpload" id="' . $inputId . '"   preview =' . $previewId . '  name=' . $name . '  value="' . $value . '" />
                <label for="' . $inputId . '"></label>
            </div>
            <div class="avatar-preview-two">
                <div id=' . $previewId . '
                    style="background-image: url(' . $value . ');">
                </div>
            </div>
        </div>';
}


function getBannerImageInput($value = '', $name = '', $classList = array(), $idsList = array())
{
    if (empty($value)) {
        $value = asset('assets/img/doctors-dashboard/no-apt-3.png');
    }

    if (isset($classList['input']) && count($classList['input']) > 0) {
        $inputClasses = implode(' ', $classList['input']);
    }

    $inputId = (isset($idsList['input']) && is_string($idsList['input'])) ? $idsList['input'] : '';
    $previewId = (isset($idsList['preview']) && is_string($idsList['preview'])) ? $idsList['preview'] : '';

    return '<div class="avatar-upload">
                <div class="avatar-edit">
                    <input class="imageUpload ' . $inputClasses . '" preview="' . $previewId . '" id="' . $inputId . '"  value="' . $value . '"  name ="' . $name . '" type="file" accept=".png, .jpg, .jpeg" />
                    <label for="' . $inputId . '"></label>
                </div>
                <div class="avatar-preview">
                    <div id="' . $previewId . '" style="background-image: url(' . $value . ');">
                    </div>
                </div>
            </div>';
}
// In GlobalHelper.php
if (!function_exists('renderTestimonials')) {
    function renderTestimonials()
    {
        $testimonials = Testimonial::get();
        if ($testimonials->isEmpty()) {
            return '';
        }

        $html = '<section class="testimonial-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="testimonial-slider slick">';

        foreach ($testimonials as $testimonial) {
            $html .= '<div class="testimonial-grid">
                        <div class="testimonial-info">
                            <div class="testimonial-img">
                                <img src="' . ($testimonial->image ?? '') . '" class="img-fluid" alt="John Doe">
                            </div>
                            <div class="testimonial-content">
                                <div class="section-header section-inner-header testimonial-header">
                                    <h5>Testimonials</h5>
                                    <h2>' . ($testimonial->title ?? '') . '</h2>
                                </div>
                                <div class="testimonial-details">
                                    <p>' . ($testimonial->description ?? '') . '</p>
                                    <h6><span>' . ($testimonial->username ?? '') . '</span>' . ($testimonial->address ?? '') . '</h6>
                                </div>
                            </div>
                        </div>
                    </div>';
        }

        $html .= '</div></div></div></div></section>';

        return $html;
    }
}

function getFormattedDate($date)
{
    return date('jS M Y', strtotime($date));
}

/**
 * Check payment status of booked appointment using booking id
 * Return paid status od payment link to pay
 */
function checkPaymentStatusByBookingId($bookingId)
{
    $paymentDetails = Payment::where('booking_id', $bookingId)->with('bookingSlot')->first();
    $buttonHtml = '';
    if (isset($paymentDetails) && !empty($paymentDetails)) {
        if ($paymentDetails->bookingSlot->payment_required == 1)
        {
            if (strtolower($paymentDetails->payment_status) == 'completed') {
                return $buttonHtml = '<a href="" class="btn btn-success text-white"><i class="fa fa-check" aria-hidden="true"></i> Paid</a>';
            } else {
                return $buttonHtml = '<a onclick="pay_fee_now(event,\''. getEncryptId($bookingId) .'\')" href="" class="btn btn-primary text-white">Pay Now</a>';
            }
        }
    }
    return false;
}





function getSectionList($listItems = array(), $listClasses = array(), $idsList = array())
{
    $ulClasses = '';
    $liClasses = '';
    $ulId = (isset($idsList['ul']) && is_string($idsList['ul'])) ? $idsList['ul'] : '';

    // Check for ul classes
    if (isset($listClasses['ul']) && count($listClasses['ul']) > 0) {
        $ulClasses = implode(' ', $listClasses['ul']);
    }

    // Check for li classes
    if (isset($listClasses['li']) && count($listClasses['li']) > 0) {
        $liClasses = implode(' ', $listClasses['li']);
    }

    // Start building the HTML output
    $output = '<ul class="' . $ulClasses . '" id="' . $ulId . '">';

    // Loop through the list items and add each one as a list item
    foreach ($listItems as $item) {
        $output .= '<li class="' . $liClasses . '">' . $item . '</li>';
    }

    $output .= '</ul>';

    return $output;
}

if (!function_exists('calculateTotalPayments')) {
    function calculateTotalPayments($user) {
        $totalAmount = 0;

        foreach ($user->bookedAppointmentsOfDoctor as $appointment) {
            if ($appointment->payments && isset($appointment->payments->amount)) {
                $totalAmount += $appointment->payments->amount;
            }
        }

        // Format with 2 decimal places and add the $ sign
        return '$' . number_format($totalAmount, 2);
    }
}

/**
 * Encrypt the id and return the encrypted id
 */
function getEncryptId($id)
{
    if(!empty($id))
    {
        return Crypt::encrypt($id);
    }
    return false;
}

/**
 * Decrypt the encrypted id and return the original id
 */
function getDecryptId($id)
{
    if(!empty($id))
    {
        return Crypt::decrypt($id);
    }
    return false;
}

if (!function_exists('formatDoctorAddress')) {
    function formatDoctorAddress($doctor) {
        if (isset($doctor->doctorAddress)) {
            $addressParts = [];

            if (isset($doctor->doctorAddress->address)) {
                $addressParts[] = $doctor->doctorAddress->address;
            }
            if (isset($doctor->doctorAddress->city)) {
                $addressParts[] = $doctor->doctorAddress->city;
            }
            if (isset($doctor->doctorAddress->states->name)) {
                $addressParts[] = $doctor->doctorAddress->states->name;
            }
            if (isset($doctor->doctorAddress->states->country->name)) {
                $addressParts[] = $doctor->doctorAddress->states->country->name;
            }

            return implode(', ', $addressParts);
        }

        return '';
    }
}

if (!function_exists('encodeAddress')) {
    function encodeAddress($doctor) {
        $fullAddress = formatDoctorAddress($doctor);
        // Encode the address (replace spaces with '+')
        return str_replace(' ', '+', $fullAddress);
    }
}

if (!function_exists('formatDoctorSpecializations')) {
    function formatDoctorSpecializations($doctor) {
        if ($doctor->specializations->isNotEmpty()) {
            return $doctor->specializations->implode('name', ', ');
        } else {
            return 'Specialty Not Added';
        }
    }
}

if (!function_exists('formatDoctorEducations')) {
    function formatDoctorEducations($doctor) {
        if ($doctor->educations->isEmpty()) {
            return 'N/A';
        }

        $educations = $doctor->educations->map(function ($education) {
            return $education->course->name;
        });

        return '(' . $educations->implode(', ') . ')';
    }
}

/**
 * Set paypal credentials in a array with dynamic values
 * @return paypal configuration details
 */
function getPaypalConfig($doctorId)
{
    $useAdminConfig = SiteConfig::where('name','Paypal_Config')->first();

    if($useAdminConfig->value == 'admin')
    {
        $paypalConfigs = SiteConfig::whereIN('name',['PAYPAL_SANDBOX_CLIENT_ID','PAYPAL_SANDBOX_CLIENT_SECRET','PAYPAL_LIVE_CLIENT_ID','PAYPAL_LIVE_CLIENT_SECRET','PAYPAL_MODE','PAYPAL_LIVE_APP_ID'])->get()->pluck('value','name');
    }
    else if($useAdminConfig->value == 'doctor')
    {
        $paypalConfigs = PaypalConfig::where('doctor_id',$doctorId)->first();
    }

    return [
        'mode'    => $paypalConfigs['PAYPAL_MODE'], // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
        'sandbox' => [
            'client_id'         => $paypalConfigs['PAYPAL_SANDBOX_CLIENT_ID'],
            'client_secret'     => $paypalConfigs['PAYPAL_SANDBOX_CLIENT_SECRET'],
            'app_id'            => 'APP-80W284485P519543T',
        ],
        'live' => [
            'client_id'         => $paypalConfigs['PAYPAL_LIVE_CLIENT_ID'],
            'client_secret'     => $paypalConfigs['PAYPAL_LIVE_CLIENT_SECRET'],
            'app_id'            => $paypalConfigs['PAYPAL_LIVE_APP_ID'],
        ],

        'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
        'currency'       => env('PAYPAL_CURRENCY', 'USD'),
        'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
        'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
        'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
    ];
}

function generateMeetingId($bookingId)
{
    $bookingDetails = BookingSlots::find($bookingId);
    $timestamp = now()->format('YmdHis');
    $meeetingId = $bookingDetails->doctor_id . $timestamp . $bookingDetails->patient_id . $bookingId;
    $bookingDetails->update(['meeting_id' => $meeetingId]);
}



function getAppointmentColoredStatus($status) {

    switch (trim($status)) {
        case 'cancelled':
            return '<span style="color: red; font-weight: bold;" class="badge badge-danger text-white"  >Canceled</span>';
        case 'requested':
            return '<span style="color: yellow; font-weight: bold;" class="badge badge-warning text-white" >Requested</span>';
        case 'confirmed':
            return '<span style="color: green; font-weight: bold;" class="badge badge-success text-white" >Confirmed</span>';
        case 'completed':
            return '<span style="color: blue; font-weight: bold;" class="badge badge-primary text-white">Completed</span>';
        default:
            return '<span style="color: gray;">Unknown Status</span>';
    }
}

/**
 * Checking if booking is allowed for the current doctor.
 * Step 1: Check if booking configurations are added and it is in active status
 * Step 2: Check if stop_slots_date is set and it has not passed yet
 */
 function checkBookingAvailable($doctorId)
 {
    $appointmentDetails = DoctorAppointmentConfig::where('user_id',$doctorId)
                        ->where('status',1)
                        ->where(function($query){
                            return $query->whereNull('stop_slots_date')
                            ->orWhere('stop_slots_date','>=',Carbon::today());
                        })->first();

    if($appointmentDetails)
    {
        return true;
    }
    else
    {
        return false;
    }
 }

/**
 * Check doctor profile completeness
 */
function checkDoctorProfileCompleteStatus($doctorId)
{
    $doctorDetails = User::where('id',$doctorId)->with([
        'specializations','services','doctorAddress','educations',
        'experiences','awards','workingHour','language','socialMediaAccounts'
    ])->first();
    $percentage = 0;
    $pendingProfiles = [];
    $completedProfiles = [];

    if ($doctorDetails->role === 2)
    {
        // Check if basic details is added
        if (!empty($doctorDetails->first_name) && !empty($doctorDetails->last_name)) 
        {
            $percentage += 10;
            $completedProfiles['basic_profile'] = 'Basic Details';
        }
        else
        {
            $pendingProfiles['basic_profile'] = 'Basic Details';
        }

        // Check if profile picture and about description is added
        if (!empty($doctorDetails->image_url) && !empty($doctorDetails->description)) 
        {
            if(!empty($doctorDetails->image_url))
            {
                $percentage += 5;
            }

            if(!empty($doctorDetails->description))
            {
                $percentage += 5;
            }
            $completedProfiles['profile_picture_and_description'] = 'Profile Picture & About';
        }
        else
        {
            $pendingProfiles['profile_and_description'] = 'Profile Picture & About';
        }

        // Now create a list of all relationship methods
        // To check if additional profiles details has been added by doctor or not ?
        $profileChecks = [
            'specializations'  =>  'Specialities',
            'services'         =>  'Services',
            'doctorAddress'    =>  'Address',
            'educations'       =>  'Education',
            'experiences'      =>  'Experience',
            'awards'           =>  'Awards',
            'workingHour'      =>  'Working Hours',
            'language'         =>  'Languages',
            'socialMediaAccounts'  =>  'Social Media'
        ];

        foreach ($profileChecks as $profileCheck => $profileText) {
            if (!empty($doctorDetails->$profileCheck) && $doctorDetails->$profileCheck()->exists()) 
            {
                $value = 10;
                if ($profileCheck == 'socialMediaAccounts' || $profileCheck == 'language') {
                    $value = 5;
                }
                $percentage += $value;
                $completedProfiles[$profileCheck] = $profileText;
            }
            else
            {
                $pendingProfiles[$profileCheck] = $profileText;
            }
        }
    }

    $profileStatus = [
        'doctor_id' =>  $doctorId,
        'total'     =>  $percentage,
        'completed' =>  $completedProfiles,
        'pending'   =>  $pendingProfiles
    ];

    $updated = $doctorDetails->update(['profile_status' =>  $percentage]);
    return $profileStatus;
}

/**
 * Create HTML for doctor profile complete status
 */
function createDoctorProfileStatus($profileStatus)
{
    $doctorLoggedIn = false;
    $doctorId = $profileStatus['doctor_id'];
    if(Auth::user()->role === 2)
    {
        $doctorLoggedIn = true;
    }

    $completed = $profileStatus['completed'];
    $pending = $profileStatus['pending'];
    $profileStatusHtml = '<div id="doctor-profile-progress-status"><ul id="progressbar">';

    foreach($completed as $key  =>  $value)
    {
        $profileStatusHtml .= '<li class="active">';
        $profileStatusHtml .= $value;
        $profileStatusHtml .= '</li>';
    }

    foreach($pending as $key  =>  $value)
    {
        if($doctorLoggedIn)
        {
            $profileUrl = route('doctor.doctor-profile.index') . '?update='.$key;
        }
        else
        {
            $profileUrl = route('admin.edit-doctor',$doctorId) . '?update='.$key;
        }
        $profileStatusHtml .= '<li><a href="'. $profileUrl .'">';
        $profileStatusHtml .= $value;
        $profileStatusHtml .= '</a></li>';
    }

    $profileStatusHtml .= '</ul>';

    $profileStatusHtml .=   '<div class="container">';
    $profileStatusHtml .=   '<div class="progress">';
    $profileStatusHtml .=   '<div class="progress-bar" data-complete="0">0%</div>';
    $profileStatusHtml .=   '</div>';
    $profileStatusHtml .=   '</div>';
    $profileStatusHtml .=   '</div>';
    $profileStatusHtml .=   '<script>jQuery(document).ready(function(){ update_profile_progress_animation('. $profileStatus['total'] .'); })</script>';

    return $profileStatusHtml;    
}
