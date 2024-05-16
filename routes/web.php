<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HealthmonitoringController;
use App\Http\Controllers\InstantController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\AppointmentController; 
use App\Http\Controllers\Admin\ProfileController; 
use App\Http\Controllers\Admin\SettingsController; 
use App\Http\Controllers\Admin\SpecialityController; 
use App\Http\Controllers\Admin\AdmindoctorController; 
use App\Http\Controllers\Admin\PatientlistController; 
use App\Http\Controllers\Admin\TransactionController; 
use App\Http\Controllers\Admin\InvoicereportController; 
use App\Http\Controllers\Patient\PatientdashboardController; 

Route::group(['middleware'=>['guest']],function(){

});

Route::get('/',[HomeController::class,'home'])->name('home.index');
Route::get('/about',[AboutController::class,'about'])->name('about.index');
Route::get('/contact',[ContactController::class,'contact'])->name('contact.index');
Route::get('/doctors',[DoctorController::class,'doctors'])->name('doctors.index');
Route::get('/health_monitoring',[HealthmonitoringController::class,'health_monitoring'])->name('health_monitoring.index');
Route::get('/instant',[InstantController::class,'instant'])->name('instant.index');
Route::get('/login',[LoginController::class,'login'])->name('login.index');
Route::post('/login',[LoginController::class,'userLogin'])->name('login.userLogin');
Route::get('/forgot-password',[LoginController::class,'forgotPassword'])->name('forgot-password.index');  
Route::post('/forgot-password',[LoginController::class,'sendForgetPasswordOtp'])->name('forgot-password.sendOtp');  
Route::get('/register',[RegisterController::class,'register'])->name('register.index'); 
Route::post('/register',[RegisterController::class,'userRegister'])->name('register.userRegister'); 
Route::get('/privacy',[FrontController::class,'privacy'])->name('privacy.index');  
Route::get('/term',[FrontController::class,'term'])->name('term.index'); 
Route::get('/appointment',[DoctorController::class,'appointment'])->name('appointment.index');
Route::get('/doctor_profile',[DoctorController::class,'doctor_profile'])->name('doctor_profile.index'); 
Route::get('/invoice',[FrontController::class,'invoice'])->name('invoice.index'); 
Route::get('/patient_details',[FrontController::class,'patient_details'])->name('patient_details.index'); 
Route::get('/success',[FrontController::class,'success'])->name('success.index');  
Route::get('/checkout',[FrontController::class,'checkout'])->name('checkout.index');    

// Admin panel
Route::prefix('admin')->group(function () {
// Pages starts
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard.index');   
Route::get('/appointment-list',[AppointmentController::class,'appointmentList'])->name('admin.appointment-list.index'); 
Route::get('/profile',[ProfileController::class,'profile'])->name('admin.profile.index'); 
Route::get('/settings',[SettingsController::class,'settings'])->name('admin.settings.index');   
Route::get('/specialities',[SpecialityController::class,'speciality'])->name('admin.speciality.index');  
Route::get('/doctors',[AdmindoctorController::class,'doctors'])->name('admin.doctors.index');   
Route::get('/patient-list',[PatientlistController::class,'patientList'])->name('admin.patient-list.index');  
Route::get('/reviews',[AdminController::class,'reviews'])->name('admin.reviews.index'); 
Route::get('/transactions-list',[TransactionController::class,'transactionsList'])->name('admin.transactions-list.index');  
Route::get('/invoice-report',[InvoicereportController::class,'invoiceReport'])->name('admin.invoice-report.index');   
Route::get('/invoice',[InvoicereportController::class,'invoice'])->name('admin.invoice.index');   
//Pages ends
});

// Patients panel
Route::prefix('patients')->group(function () {
// Pages starts
Route::get('/patient-dashboard',[PatientdashboardController::class,'patientDashboard'])->name('patients.patient-dashboard.index');   
Route::get('/patient-accounts',[PatientdashboardController::class,'paitentAccounts'])->name('patients.patient-accounts.index');  
Route::get('/patient-appointment-details',[PatientdashboardController::class,'paitentAppointmentDetails'])->name('patients.patient-appointment-details.index');  
Route::get('/patient-appointments',[PatientdashboardController::class,'paitentAppointments'])->name('patients.patient-appointments.index');  
Route::get('/patient-dependant',[PatientdashboardController::class,'paitentDependant'])->name('patients.patient-dependant.index');  
Route::get('/patient-invoices',[PatientdashboardController::class,'paitentInvoices'])->name('patients.patient-invoices.index');  
Route::get('/patient-profile',[PatientdashboardController::class,'paitentProfile'])->name('patients.patient-profile.index');  
Route::get('/patient-settings',[PatientdashboardController::class,'paitentSettings'])->name('patients.patient-settings.index');  

//Pages ends
});











