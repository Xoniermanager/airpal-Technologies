@extends('layouts.patient.main')
@section('content')
        <div class="onboard-wrapper">
            <div class="left-panel">
                <div class="onboarding-logo text-center">
                    <a href="{{ route('patient-dashboard.index') }}"><img src="../assets/img/logo-light.png" class="img-fluid" alt="logo"></a>
                </div>
                <div class="onboard-img">
                    <img src="../assets/img/onboard-img/onb-slide-img.png" class="img-fluid" alt="onboard-slider">
                </div>
                <div class="onboarding-slider">

                    <div id="onboard-slider" class="owl-carousel owl-theme onboard-slider slider">

                        <div class="onboard-item text-center">
                            <div class="onboard-content">
                                <h3>Welcome to Telemedicine App</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                </p>
                            </div>
                        </div>


                        <div class="onboard-item text-center">
                            <div class="onboard-content">
                                <h3>Welcome to Telemedicine App</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                </p>
                            </div>
                        </div>


                        <div class="onboard-item text-center">
                            <div class="onboard-content">
                                <h3>Welcome </h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="right-panel">
                <div class="container pt-5 pb-5">
                    <div class="row">
                        <div class="col-md-12">

                            <ul class="store-tab nav">
                                <li>
                                    <a href="#" class="active" data-bs-toggle="tab"
                                        data-bs-target="#eyeglass">Registration
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-bs-toggle="tab" data-bs-target="#computer">Personal Details</a>
                                </li>
                                <li>
                                    <a href="#" data-bs-toggle="tab" data-bs-target="#kids">Select Members</a>
                                </li>
                                <li>
                                    <a href="#" data-bs-toggle="tab" data-bs-target="#lense">Dependant details</a>
                                </li>
                                <li>
                                    <a href="#" data-bs-toggle="tab" data-bs-target="#sunglass">Other Details</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">

                        <div class="tab-pane active" id="eyeglass">
                            <div class="col-lg-8 col-md-12 m-auto">
                                <div class="onboarding-content-box content-wrap">
                                    <div class="onborad-set">
                                        <div class="onboarding-title">
                                            <h2>Whats your Primary email?<span>*</span></h2>
                                            <h6>We will only use it to advise you for any important changes.</h6>
                                        </div>
                                        <div class="onboarding-content">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <div
                                                            class="input-placeholder form-focus passcode-wrap mail-box">
                                                            <label class="focus-label">Legal name<span>*</span></label>
                                                            <input type="text" class="form-control floating"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <div
                                                            class="input-placeholder form-focus passcode-wrap mail-box">
                                                            <label class="focus-label">Email
                                                                Address<span>*</span></label>
                                                            <input type="text" class="form-control floating"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="onboarding-btn">
                                        <a href="patient-email-otp.html">Continue</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="computer">

                            <div class="col-lg-8 col-md-12 m-auto">
                                <div class="onboarding-content-box content-wrap">
                                    <div class="onboarding-title">
                                        <h2>What are your personal details? <span>*</span></h2>
                                        <h6>Please provide your personal information</h6>
                                    </div>
                                    <div class="patient-details-form">
                                        <div class="login-header">
                                            <form id="personal_details" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <div class="row select-gender-option">
                                                        <div class="col-6">
                                                            <div class="option-set">
                                                                <input type="radio" id="test1" name="gender"
                                                                    value="Male">
                                                                <label for="test1">
                                                                    <span><i class="fas fa-mars"></i> Male</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 ">
                                                            <input type="radio" id="test2" name="gender" value="Female">
                                                            <label for="test2">
                                                                <span><i class="fas fa-venus"></i> Female</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <div class="passcode-wrap input-placeholder form-focus">
                                                                <label class="focus-label">Your
                                                                    Weight<span>*</span></label>
                                                                <input type="text" class="form-control floating"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <select class="select select2-hidden-accessible"
                                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                                <option selected="" data-select2-id="3">KG</option>
                                                                <option>LBS</option>
                                                            </select><span
                                                                class="select2 select2-container select2-container--default"
                                                                dir="ltr" data-select2-id="2" style="width: 100%;"><span
                                                                    class="selection"><span
                                                                        class="select2-selection select2-selection--single"
                                                                        role="combobox" aria-haspopup="true"
                                                                        aria-expanded="false" tabindex="0"
                                                                        aria-disabled="false"
                                                                        aria-labelledby="select2-bk85-container"><span
                                                                            class="select2-selection__rendered"
                                                                            id="select2-bk85-container" role="textbox"
                                                                            aria-readonly="true"
                                                                            title="KG">KG</span><span
                                                                            class="select2-selection__arrow"
                                                                            role="presentation"><b
                                                                                role="presentation"></b></span></span></span><span
                                                                    class="dropdown-wrapper"
                                                                    aria-hidden="true"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <div class="passcode-wrap input-placeholder form-focus">
                                                                <label class="focus-label">Your
                                                                    Height<span>*</span></label>
                                                                <input type="text" class="form-control floating"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <select class="select select2-hidden-accessible"
                                                                data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                                <option selected="" data-select2-id="6">CM</option>
                                                                <option>FEET</option>
                                                                <option>INCH</option>
                                                            </select><span
                                                                class="select2 select2-container select2-container--default"
                                                                dir="ltr" data-select2-id="5" style="width: 100%;"><span
                                                                    class="selection"><span
                                                                        class="select2-selection select2-selection--single"
                                                                        role="combobox" aria-haspopup="true"
                                                                        aria-expanded="false" tabindex="0"
                                                                        aria-disabled="false"
                                                                        aria-labelledby="select2-i35w-container"><span
                                                                            class="select2-selection__rendered"
                                                                            id="select2-i35w-container" role="textbox"
                                                                            aria-readonly="true"
                                                                            title="CM">CM</span><span
                                                                            class="select2-selection__arrow"
                                                                            role="presentation"><b
                                                                                role="presentation"></b></span></span></span><span
                                                                    class="dropdown-wrapper"
                                                                    aria-hidden="true"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <div class="passcode-wrap input-placeholder form-focus">
                                                                <label class="focus-label">Age<span>*</span></label>
                                                                <input type="text" class="form-control floating"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <select class="select select2-hidden-accessible"
                                                                data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                                <option disabled="" selected="" data-select2-id="9">
                                                                    Blood Type</option>
                                                                <option>O+ve</option>
                                                                <option>O-ve</option>
                                                                <option>B+ve</option>
                                                                <option>B-ve</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <div class="passcode-wrap input-placeholder form-focus">
                                                                <label class="focus-label">Heart
                                                                    Rate<span>*</span></label>
                                                                <input type="text" class="form-control floating"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <div class="passcode-wrap input-placeholder form-focus">
                                                                <label class="focus-label">Blood Pressure
                                                                    <span>*</span></label>
                                                                <input type="text" class="form-control floating"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <div class="passcode-wrap input-placeholder form-focus">
                                                                <label class="focus-label">Glucose Level
                                                                    <span>*</span></label>
                                                                <input type="text" class="form-control floating"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <div class="passcode-wrap input-placeholder form-focus">
                                                                <label class="focus-label">Allergies
                                                                    <span>*</span></label>
                                                                <input type="text" class="form-control floating"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <div class="pregnant-col pt-4">
                                                                <div>
                                                                    <div
                                                                        class="remember-me-col d-flex justify-content-between align-items-center">
                                                                        <span class="mt-1">Are you Pregnant</span>
                                                                        <label class="custom_check">
                                                                            <input type="checkbox" class="form-control"
                                                                                id="is_registered" name="pregnant"
                                                                                value="1">
                                                                            <span class="checkmark"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="step-process-col mt-4">
                                                                <div class="mb-3" id="preg_div" style="display: none;">
                                                                    <select
                                                                        class="select form-control select2-hidden-accessible"
                                                                        id="preg_term" name="preg_term" tabindex="-1"
                                                                        aria-hidden="true" data-select2-id="preg_term">
                                                                        <option selected="" value=""
                                                                            data-select2-id="11">Select Your Pregnancy
                                                                            Month</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                    </select><span
                                                                        class="select2 select2-container select2-container--default"
                                                                        dir="ltr" data-select2-id="10"
                                                                        style="width: 100%;"><span
                                                                            class="selection"><span
                                                                                class="select2-selection select2-selection--single"
                                                                                role="combobox" aria-haspopup="true"
                                                                                aria-expanded="false" tabindex="-1"
                                                                                aria-disabled="false"
                                                                                aria-labelledby="select2-preg_term-container"><span
                                                                                    class="select2-selection__rendered"
                                                                                    id="select2-preg_term-container"
                                                                                    role="textbox" aria-readonly="true"
                                                                                    title="Select Your Pregnancy Month">Select
                                                                                    Your Pregnancy Month</span><span
                                                                                    class="select2-selection__arrow"
                                                                                    role="presentation"><b
                                                                                        role="presentation"></b></span></span></span><span
                                                                            class="dropdown-wrapper"
                                                                            aria-hidden="true"></span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <div class="checklist-col">
                                                                    <div
                                                                        class="remember-me-col d-flex justify-content-between align-items-center">
                                                                        <span class="mt-1">Do you have any pre-exisiting
                                                                            conditions?</span>
                                                                        <label class="custom_check">
                                                                            <input type="checkbox" class="form-control"
                                                                                name="cancer" id="cancer" value="1">
                                                                            <span class="checkmark"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="remember-me-col" id="cancer_div"
                                                                        style="display:none">
                                                                        <div class="condition_input">
                                                                            <input type="text" id="conditions"
                                                                                name="conditions[]" class="form-control"
                                                                                placeholder="">
                                                                        </div>
                                                                        <a href="javascript:void(0);"
                                                                            class="add_condition"><i
                                                                                class="fa fa-plus"></i></a>
                                                                    </div>
                                                                    <div
                                                                        class="remember-me-col d-flex justify-content-between align-items-center">
                                                                        <span class="mt-1">Are you currently taking any
                                                                            medication</span>
                                                                        <label class="custom_check">
                                                                            <input type="checkbox" class="form-control"
                                                                                name="medicine" id="medicine" value="1">
                                                                            <span class="checkmark"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="remember-me-col" id="medicine_div"
                                                                        style="display:none">
                                                                        <div class="medicine_input">
                                                                            <input type="text" id="medicine_name"
                                                                                name="medicine_name[]" value=""
                                                                                class="form-control"
                                                                                placeholder="Enter medicine_name">
                                                                            <input type="text" value="" id="dosage"
                                                                                name="dosage[]" class="form-control"
                                                                                placeholder="Enter dosage">
                                                                        </div>
                                                                        <a href="javascript:void(0);"
                                                                            class="add_medicine"><i
                                                                                class="fa fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="onboarding-btn">
                                        <a href="patient-family-details.html">Continue</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="kids">
                            <div class="col-lg-8 col-md-12 m-auto">
                                <div class="onboarding-content-box content-wrap">
                                    <div class="onborad-set">
                                        <div class="onboarding-title">
                                            <h2>Select Members<span>*</span></h2>
                                            <h6>Who all you want to cover in health insurance</h6>
                                        </div>
                                        <div class="onboarding-content">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form method="post">
                                                        <div class="checklist-col pregnant-col">
                                                            <div class="remember-me-col d-flex justify-content-between">
                                                                <span class="mt-1">Self</span>
                                                                <label class="custom_check">
                                                                    <input type="checkbox" class="form-control"
                                                                        name="self" id="self" value="1" checked="">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="remember-me-col d-flex align-items-center justify-content-between">
                                                                <span class="mt-1">Spouse</span>
                                                                <label class="custom_check">
                                                                    <input type="checkbox" class="form-control"
                                                                        name="spouse" id="spouse" value="1">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="remember-me-col d-flex align-items-center justify-content-between">
                                                                <span class="mt-1">Child</span>
                                                                <div class="increment-decrement">
                                                                    <div class="input-groups">
                                                                        <input type="button" value="-" id="subs"
                                                                            class="button-minus dec button">
                                                                        <input type="text" name="child" id="child"
                                                                            value="0" class="quantity-field">
                                                                        <input type="button" value="+" id="adds"
                                                                            class="button-plus inc button a1 a2 a3 a4 a0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="remember-me-col d-flex align-items-center justify-content-between">
                                                                <span class="mt-1">Mother</span>
                                                                <label class="custom_check">
                                                                    <input type="checkbox" class="form-control"
                                                                        name="mother" id="mother" value="1">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="remember-me-col d-flex align-items-center justify-content-between">
                                                                <span class="mt-1">Father</span>
                                                                <label class="custom_check">
                                                                    <input type="checkbox" class="form-control"
                                                                        name="father" id="father" value="1">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="onboarding-btn">
                                        <a href="patient-dependant-details.html">Continue</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="lense">
                            <div class="col-lg-8 col-md-12 m-auto">
                                <div class="onboarding-content-box content-wrap">
                                    <div class="onborad-set">
                                        <div class="onboarding-title">
                                            <h2>Dependant details<span>*</span></h2>
                                            <h6>Add age &amp; Photo of the each members</h6>
                                        </div>
                                        <div class="onboarding-content passcode-wrap mail-box">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                                <button class="accordion-button" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#panelsStayOpen-collapseOne"
                                                                    aria-expanded="true"
                                                                    aria-controls="panelsStayOpen-collapseOne">
                                                                    Child
                                                                </button>
                                                            </h2>
                                                            <div id="panelsStayOpen-collapseOne"
                                                                class="accordion-collapse collapse show"
                                                                aria-labelledby="panelsStayOpen-headingOne">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 ">
                                                                                <div
                                                                                    class="passcode-wrap input-placeholder form-focus">
                                                                                    <label
                                                                                        class="focus-label">Name</label>
                                                                                    <input type="text"
                                                                                        class="form-control floating"
                                                                                        required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 ">
                                                                                <div
                                                                                    class="passcode-wrap input-placeholder form-focus">
                                                                                    <label class="focus-label">Age
                                                                                        <span>*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control floating"
                                                                                        required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <div class="relative-form">
                                                                                    <span>Upload Photo</span>
                                                                                    <label class="relative-file-upload">
                                                                                        File Upload <input type="file">
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#panelsStayOpen-collapseTwo"
                                                                    aria-expanded="false"
                                                                    aria-controls="panelsStayOpen-collapseTwo">
                                                                    Spouse
                                                                </button>
                                                            </h2>
                                                            <div id="panelsStayOpen-collapseTwo"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="panelsStayOpen-headingTwo">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 ">
                                                                                <div
                                                                                    class="passcode-wrap input-placeholder form-focus">
                                                                                    <label
                                                                                        class="focus-label">Name</label>
                                                                                    <input type="text"
                                                                                        class="form-control floating"
                                                                                        required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 ">
                                                                                <div
                                                                                    class="passcode-wrap input-placeholder form-focus">
                                                                                    <label class="focus-label">Age
                                                                                        <span>*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control floating"
                                                                                        required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <div class="relative-form">
                                                                                    <span>Upload Photo</span>
                                                                                    <label class="relative-file-upload">
                                                                                        File Upload <input type="file">
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header"
                                                                id="panelsStayOpen-headingThree">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#panelsStayOpen-collapseThree"
                                                                    aria-expanded="false"
                                                                    aria-controls="panelsStayOpen-collapseThree">
                                                                    Father
                                                                </button>
                                                            </h2>
                                                            <div id="panelsStayOpen-collapseThree"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="panelsStayOpen-headingThree">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 ">
                                                                                <div
                                                                                    class="passcode-wrap input-placeholder form-focus">
                                                                                    <label
                                                                                        class="focus-label">Name</label>
                                                                                    <input type="text"
                                                                                        class="form-control floating"
                                                                                        required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 ">
                                                                                <div
                                                                                    class="passcode-wrap input-placeholder form-focus">
                                                                                    <label class="focus-label">Age
                                                                                        <span>*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control floating"
                                                                                        required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <div class="relative-form">
                                                                                    <span>Upload Photo</span>
                                                                                    <label class="relative-file-upload">
                                                                                        File Upload <input type="file">
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header"
                                                                id="panelsStayOpen-headingfour">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#panelsStayOpen-collapsefour"
                                                                    aria-expanded="false"
                                                                    aria-controls="panelsStayOpen-collapsefour">
                                                                    Mother
                                                                </button>
                                                            </h2>
                                                            <div id="panelsStayOpen-collapsefour"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="panelsStayOpen-headingfour">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 ">
                                                                                <div
                                                                                    class="passcode-wrap input-placeholder form-focus">
                                                                                    <label
                                                                                        class="focus-label">Name</label>
                                                                                    <input type="text"
                                                                                        class="form-control floating"
                                                                                        required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 ">
                                                                                <div
                                                                                    class="passcode-wrap input-placeholder form-focus">
                                                                                    <label class="focus-label">Age
                                                                                        <span>*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control floating"
                                                                                        required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <div class="relative-form">
                                                                                    <span>Upload Photo</span>
                                                                                    <label class="relative-file-upload">
                                                                                        File Upload <input type="file">
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="onboarding-btn">
                                        <a href="patient-other-details.html">Continue</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="sunglass">
                            <div class="col-lg-8 col-md-12 m-auto">
                                <div class="onboarding-content-box content-wrap">
                                    <div class="onborad-set">
                                        <div class="onboarding-title">
                                            <h2>Other Details<span>*</span></h2>
                                            <h6>Please fill the details below</h6>
                                        </div>
                                        <div class="onboarding-content passcode-wrap mail-box">
                                            <div class="row">
                                                <form method="post">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3 ">
                                                            <div class="input-placeholder form-focus passcode-wrap">
                                                                <label class="focus-label">Enter Address</label>
                                                                <input type="text" class="form-control floating"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <select class="select select2-hidden-accessible"
                                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                                <option disabled="" selected="" data-select2-id="3">
                                                                    Select City</option>
                                                                <option>New York</option>
                                                                <option>Los Angeles</option>
                                                                <option>Chicago</option>
                                                                <option>Houston</option>
                                                            </select><span
                                                                class="select2 select2-container select2-container--default"
                                                                dir="ltr" data-select2-id="2" style="width: 100%;"><span
                                                                    class="selection"><span
                                                                        class="select2-selection select2-selection--single"
                                                                        role="combobox" aria-haspopup="true"
                                                                        aria-expanded="false" tabindex="0"
                                                                        aria-disabled="false"
                                                                        aria-labelledby="select2-yv8q-container"><span
                                                                            class="select2-selection__rendered"
                                                                            id="select2-yv8q-container" role="textbox"
                                                                            aria-readonly="true"
                                                                            title="Select City">Select City</span><span
                                                                            class="select2-selection__arrow"
                                                                            role="presentation"><b
                                                                                role="presentation"></b></span></span></span><span
                                                                    class="dropdown-wrapper"
                                                                    aria-hidden="true"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <select class="select select2-hidden-accessible"
                                                                data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                                <option disabled="" selected="" data-select2-id="6">
                                                                    Select State</option>
                                                                <option>Alaska</option>
                                                                <option>California</option>
                                                                <option>Hawaii</option>
                                                                <option>Georgia</option>
                                                            </select><span
                                                                class="select2 select2-container select2-container--default"
                                                                dir="ltr" data-select2-id="5" style="width: 100%;"><span
                                                                    class="selection"><span
                                                                        class="select2-selection select2-selection--single"
                                                                        role="combobox" aria-haspopup="true"
                                                                        aria-expanded="false" tabindex="0"
                                                                        aria-disabled="false"
                                                                        aria-labelledby="select2-f5jk-container"><span
                                                                            class="select2-selection__rendered"
                                                                            id="select2-f5jk-container" role="textbox"
                                                                            aria-readonly="true"
                                                                            title="Select State">Select
                                                                            State</span><span
                                                                            class="select2-selection__arrow"
                                                                            role="presentation"><b
                                                                                role="presentation"></b></span></span></span><span
                                                                    class="dropdown-wrapper"
                                                                    aria-hidden="true"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <select class="select select2-hidden-accessible"
                                                                data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                                <option disabled="" selected="" data-select2-id="9">
                                                                    Select Country</option>
                                                                <option>Argentina</option>
                                                                <option>Brazil</option>
                                                                <option>Chile</option>
                                                                <option>Egypt</option>
                                                            </select><span
                                                                class="select2 select2-container select2-container--default"
                                                                dir="ltr" data-select2-id="8" style="width: 100%;"><span
                                                                    class="selection"><span
                                                                        class="select2-selection select2-selection--single"
                                                                        role="combobox" aria-haspopup="true"
                                                                        aria-expanded="false" tabindex="0"
                                                                        aria-disabled="false"
                                                                        aria-labelledby="select2-0ct7-container"><span
                                                                            class="select2-selection__rendered"
                                                                            id="select2-0ct7-container" role="textbox"
                                                                            aria-readonly="true"
                                                                            title="Select Country">Select
                                                                            Country</span><span
                                                                            class="select2-selection__arrow"
                                                                            role="presentation"><b
                                                                                role="presentation"></b></span></span></span><span
                                                                    class="dropdown-wrapper"
                                                                    aria-hidden="true"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3 ">
                                                            <div class="form-floating input-placeholder passcode-wrap">
                                                                <textarea class="form-control"
                                                                    placeholder="Leave a comment here"
                                                                    id="floatingTextarea2"
                                                                    style="height: 135px"></textarea>
                                                                <label for="floatingTextarea2">Other Information</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="onboarding-btn">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#profile-completed">Continue</a>
                                    </div>

                                    <div class="modal fade fade-custom" id="profile-completed" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog id-upload modal-dialog-centered">
                                            <div class="modal-content id-pop-content">
                                                <div class="modal-header id-pop-header justify-content-center">
                                                    <img src="assets/img/icons/success-tick.svg" alt="success-tick">
                                                </div>
                                                <div class="modal-body id-pop-body text-center">
                                                    <h3>Thank you</h3>
                                                    <span> Mr.Dennis</span>
                                                    <p class="pb-0">your Account has been completed successfully</p>
                                                </div>
                                                <div class="modal-footer id-pop-footer text-center">
                                                    <div class="onboarding-btn pop-btn ">
                                                        <a href="{{ route('patient-dashboard.index') }}">Go to Dashboard</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection