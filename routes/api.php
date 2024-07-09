<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorAwardController;
use App\Http\Controllers\Api\DoctorFilterController;
use App\Http\Controllers\Api\DoctorProfileController;
use App\Http\Controllers\Api\DoctorEducationController;
use App\Http\Controllers\Api\DoctorExperienceController;
use App\Http\Controllers\Api\DoctorWorkingHourController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('doctor')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::get('logout', 'logout');
        Route::post('resend-otp', 'resendOtp');
        Route::post('forget-password-send-otp', 'forgetPasswordSendOtp');
        Route::post('verify-otp', 'verifyOtp');
        Route::post('forget-password', 'forgetPassword');
    });

    Route::controller(DoctorProfileController::class)->group(function () {
        Route::get('profile', 'profile');
        Route::post('create', 'createOrUpdate');
        Route::post('address/update', 'updateAddress');
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

    Route::controller(DoctorFilterController::class)->group(function () {
        Route::get('search', 'doctorSearch');
    });

});
