<?php

use App\Http\Controllers\Api\BookAppointmentApiController;
use App\Http\Controllers\Api\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Doctor\DoctorAppointmentAndRevenueGraphController;
use App\Http\Controllers\Api\DoctorAwardController;
use App\Http\Controllers\Api\DoctorSlotsController;
use App\Http\Controllers\Api\DoctorProfileController;
use App\Http\Controllers\Api\DoctorEducationController;
use App\Http\Controllers\Api\DoctorExperienceController;
use App\Http\Controllers\Api\DoctorAppointmentController;
use App\Http\Controllers\Api\DoctorDashboardController;
use App\Http\Controllers\Api\DoctorReviewController;
use App\Http\Controllers\Api\DoctorWorkingHourController;
use App\Http\Controllers\Api\DoctorAppointmentConfigController;
use App\Http\Controllers\Api\Patient\AllListingController;
use App\Http\Controllers\Api\Patient\DoctorFilterController;
use App\Http\Controllers\Api\Patient\MedicalRecordApiController;
use App\Http\Controllers\Api\Patient\PatientDashboardController;
use App\Http\Controllers\Api\Patient\PatientDiaryController;
use App\Http\Controllers\Api\Patient\PatientProfileController;
use App\Http\Controllers\Api\Patient\PatientFavoriteDoctorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::get('logout', 'logout');
    Route::post('resend-otp', 'resendOtp');
    Route::post('forget-password-send-otp', 'forgetPasswordSendOtp');
    Route::post('verify-otp', 'verifyOtp');
    Route::post('forget-password', 'forgetPassword');
});


// doctor registration
Route::controller(DoctorProfileController::class)->prefix('doctor')->group(function () {
    Route::post('create', 'createOrUpdate');
});

// patient registration
Route::controller(AuthController::class)->prefix('patient')->group(function () {
    Route::post('profile/create', 'register');
});



Route::middleware('authCheck')->group(function () {

    Route::prefix('doctor')->group(function () {
        Route::post('change-password', [AuthController::class, 'changePassword']);
        Route::controller(DoctorDashboardController::class)->group(function () {
            Route::get('get-doctor-dashboard-data', 'getDashboardDetails');
        });

        Route::controller(DoctorProfileController::class)->group(function () {
            Route::get('profile', 'profile');
            Route::post('address/update', 'updateAddress');
            Route::get('get-my-patient', 'getMyPatientByDoctorId');
        });

        Route::controller(DoctorEducationController::class)->group(function () {
            Route::post('education/update', 'createOrUpdateEducation');
            Route::post('education/update/{id}', 'createOrUpdateEducationSingleRecord');
            Route::get('education/delete/{id}', 'destroy');
        });

        Route::controller(DoctorExperienceController::class)->group(function () {
            Route::post('experience/update', 'createOrUpdateExperience');
            Route::post('experience/update/{id}', 'createOrUpdateExperienceSingleRecord');
            Route::get('experience/delete/{id}', 'destroy');
        });

        Route::controller(DoctorAwardController::class)->group(function () {
            Route::post('award/update', 'createOrUpdateAward');
            Route::post('award/update/{id}', 'createOrUpdateAwardSingleRecord');
            Route::get('award/delete/{id}', 'destroy');
        });

        Route::controller(DoctorWorkingHourController::class)->group(function () {
            Route::post('working-hour/update', 'createOrUpdateWorkingHour');
        });

        Route::controller(DoctorSlotsController::class)->group(function () {
            Route::get('slots/{id}', 'get');
            Route::post('slots/create', 'store');
            Route::post('slots/update', 'update');
            Route::get('slots/delete', 'delete');
            Route::get('slots/showSlots/{id}', 'showSlotsByDoctorId');
            Route::post('slots/get-doctor-slots-by-date', 'getDoctorSlotsByDate');
        });

        Route::controller(DoctorAppointmentController::class)->group(function () {
            Route::get('doctor-current-date-appointments/{id}', 'doctorCurrentDateBookings');
            Route::get('doctor-upcoming-appointments/{id}', 'doctorUpcomingBookings');
            Route::get('appointments/{id}', 'appointmentsById');
            Route::get('all-appointments', 'getAllAppointment');
            Route::post('all-appointments-by-filter', 'getFilteredAppointment');
        });
        Route::controller(QuestionController::class)->group(function () {
            Route::get('get-all-specialization', 'getAllSpecializations');
            Route::post('add-question', 'addQuestion');
            Route::get('get-all-question', 'getAllQuestion');
            Route::post('update-question/{doctor_questions:id}', 'updateQuestion');
            Route::get('question-delete/{doctor_questions:id}', 'deleteQuestion');
            Route::get('question-option-delete/{question_options:id}', 'deleteQuestionOption');
            Route::get('get-question-details/{doctor_questions:id}', 'getQuestionDetailsById');
        });
        Route::controller(DoctorAppointmentConfigController::class)->group(function () {
            Route::get('get-appointment-config', 'getAppointmentConfig');
        });

        Route::controller(DoctorAppointmentAndRevenueGraphController::class)->group(function () {
            Route::post('get-appointment-revenue-data', 'getAppointmentAndRevenueGraphData');
            Route::post('get-revenue-data', 'getRevenueGraphData');
        });
    });

    // patient routes starts here
    Route::prefix('patient')->group(function () {
        Route::controller(PatientDashboardController::class)->group(function () {
            Route::get('get-dashboard-data', 'getDashBoardData');
        });
        Route::controller(PatientProfileController::class)->group(function () {
            Route::get('profile', 'patientProfile');
        });
        Route::controller(PatientFavoriteDoctorController::class)->group(function () {
            Route::get('favorite-doctors', 'getFavoriteDoctors');
            Route::post('add/favorite', 'addFavorite');
            Route::post('remove/favorite', 'removeFavorite');
        });
        Route::controller(AllListingController::class)->group(function () {
            Route::get('filter-listing', 'listing');
        });
        Route::controller(DoctorFilterController::class)->group(function () {
            Route::get('search', 'doctorSearch');
            Route::get('get-all-doctor/{users:id}', 'getDoctorDetailsById');
        });
        Route::controller(BookAppointmentApiController::class)->group(function () {
            Route::get('all-appointment', 'allAppointment');
            Route::post('book-appointment', 'bookingAppointment');
            Route::post('cancel-appointment/{booking_slots:id}', 'cancelAppointment');
            Route::get('upcoming-all-appointment', 'allUpcomingAppointment');
        });
        Route::controller(DoctorReviewController::class)->group(function () {
            Route::post('add-doctor-review', 'addDoctorReview');
            Route::post('update-doctor-review', 'updateDoctorReview');
            Route::get('get-all-review', 'getAllReview');
            Route::get('get-review-details/{doctor_reviews:id}', 'getReviewDetailById');
            Route::get('get-all-reviewby-doctor-id', 'getAllReviewByDoctorId');
        });
        Route::controller(PatientDiaryController::class)->group(function () {
            Route::get('all-patient-diary', 'getAllPatientDiary');
            Route::post('add-patient-diary', 'addPatientDiary');
            Route::post('update-patient-diary/{patient_diaries:id}', 'updatePatientDiary');
            Route::get('get-patient-diary-details/{patient_diaries:id}', 'getDiaryDetailsById');
            Route::get('check-today-patient-diary/{date}', 'checkTodayDateDiaryDetails');
        });
        Route::controller(MedicalRecordApiController::class)->group(function () {
            Route::get('medical-records', 'medicalRecordsList');
            Route::post('create-medical-record', 'createMedicalRecord');
            Route::get('edit-medical-record/{medical_records:id}', 'editMedicalRecord');
            Route::post('update-medical-record/{medical_records:id}', 'updateMedicalRecord');
            Route::get('delete-medical-record/{medical_records:id}', 'deleteMedicalRecord');
            Route::get('medical-records-filter', 'searchFilterMedicalRecord');
            Route::get('get-booking-slot', 'getBookingDetailsByPatientId');
        });
    });
    Route::get('privacy', [AuthController::class, 'privacyPolicy']);
});
