<?php

use App\Models\Payment;
use App\Models\SiteConfig;
use App\Models\Testimonial;
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
    $image  = $namePrefix . '-' . time() . '.' . $file->getClientOriginalExtension();
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
} // In GlobalHelper.php
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

function checkPaymentStatusByBookingId($bookingId)
{
    $paymentDetails = Payment::where('booking_id', $bookingId)->with('bookingSlot')->first();
    $buttonHtml = '';
    if (isset($paymentDetails) && !empty($paymentDetails)) {
        if ($paymentDetails->bookingSlot->payment_required == 1) {
            if ($paymentDetails->payment_status == 'completed') {
                return $buttonHtml = '<a href="" class="btn btn-success text-white"><i class="fa fa-check" aria-hidden="true"></i> Paid</a>';
            } else {
                return $buttonHtml = '<a href="" class="btn btn-primary text-white">Pay Now</a>';
            }
        }
    }
    return false;
}
