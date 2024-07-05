<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorAwardController;
use App\Http\Controllers\Api\DoctorProfileController;
use App\Http\Controllers\Api\DoctorEducationController;
use App\Http\Controllers\Api\DoctorExperienceController;
use App\Http\Controllers\Api\DoctorWorkingHourController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('doctor/login', 'login');
    Route::get('doctor/logout', 'logout');
    Route::post('doctor/register', 'register');  // Todo
    Route::Post('doctor/verify-otp', 'verifyOtp'); 
    Route::get('doctor/reset-password', 'resetPassword'); ; // Todo
});

// Route::middleware('authCheck')->group(function () {
Route::controller(DoctorProfileController::class)->group(function () {
    Route::get('doctor/profile', 'profile');
    Route::post('doctor/create' , 'createOrUpdate');
    Route::post('doctor/address/update' , 'updateAddress');
});

Route::controller(DoctorEducationController::class)->group(function () {
    Route::post('doctor/education/update' , 'createOrUpdateEducation');
    Route::get('doctor/education/delete/{id}' , 'destroy');
});

Route::controller(DoctorExperienceController::class)->group(function () {
    Route::post('doctor/experience/update' , 'createOrUpdateExperience');
    Route::get('doctor/experience/delete/{id}' , 'destroy');
});

Route::controller(DoctorAwardController::class)->group(function () {
    Route::post('doctor/award/update' , 'createOrUpdateAward');
    Route::get('doctor/award/delete/{id}' , 'destroy');
});

Route::controller(DoctorWorkingHourController::class)->group(function () {
    Route::post('doctor/working-hour/update' , 'createOrUpdateWorkingHour');
});
// });

