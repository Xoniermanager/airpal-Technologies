<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FaqsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstantController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Admin\StateController; 
use App\Http\Controllers\SpecialtyPageController;
use App\Http\Controllers\Admin\CountryController; 
use App\Http\Controllers\Admin\ProfileController; 
use App\Http\Controllers\Admin\SettingsController; 
// use App\Http\Controllers\Admin\AdmindoctorController; 
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\HealthmonitoringController;
use App\Http\Controllers\Admin\SpecialityController; 
use App\Http\Controllers\Admin\AppointmentController; 


use App\Http\Controllers\Admin\PatientlistController; 
use App\Http\Controllers\Admin\TransactionController; 
use App\Http\Controllers\Admin\InvoicereportController; 
use App\Http\Controllers\Doctor\DoctordashboardController;
use App\Http\Controllers\Patient\PatientdashboardController; 
use App\Http\Controllers\Doctor\DoctorAuthenticationController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController; 
use App\Http\Controllers\Admin\{LanguageController,ServiceController,CourseController,HospitalController,AwardController, DoctorAddressController, DoctorAwardController, DoctorEducationController,DoctorExperienceController,DoctorWorkingHourController};
// use App\Http\Controllers\DoctorController; 

Route::prefix('doctor')->group(function () {
    // Authentication Routes
    Route::controller(DoctorAuthenticationController::class)->group(function () {
        Route::get('/login', 'doctorLogin')->name('doctor.doctor-login.index');
        Route::post('/login', 'userLogin')->name('doctor.doctor-login');
        Route::get('/logout', 'logout')->name('doctor.logout');
    });

    // Dashboard Routes
    Route::controller(DoctordashboardController::class)->group(function () {
        Route::get('/doctor-dashboard', 'doctorDashboard')->name('doctor.doctor-dashboard.index');
        Route::get('/doctor-accounts', 'doctorAccounts')->name('doctor.doctor-accounts.index');
        Route::get('/doctor-timing', 'doctorTiming')->name('doctor.doctor-timing.index');
        Route::get('/doctor-appointment-details', 'doctorAppointmentDetails')->name('doctor.doctor-appointment-details.index');
        Route::get('/doctor-appointments', 'doctorAppointments')->name('doctor.doctor-appointments.index');
        
        Route::get('/doctor-profile', 'doctorProfile')->name('doctor.doctor-profile.index');

        Route::get('/doctor-change-password', 'doctorChangepass')->name('doctor.doctor-change-password.index');
        Route::get('/doctor-request', 'doctorRequest')->name('doctor.doctor-request.index');
        Route::get('/doctor-specialities', 'doctorSpecialities')->name('doctor.doctor-specialities.index');
        Route::get('/doctor-invoices', 'doctorInvoices')->name('doctor.doctor-invoices.index');
        Route::get('/doctor-reviews', 'doctorReviews')->name('doctor.doctor-reviews.index');
        Route::get('/doctor-social', 'doctorSocial')->name('doctor.doctor-social.index');
        Route::get('/doctor-patient', 'doctorPatient')->name('doctor.doctor-patients.index');
    });
});

// =========================== Admin Routes ================================
Route::prefix('admin')->group(function()
{
    Route::prefix('faqs')->controller(FaqsController::class)->group(function(){
        Route::get('/','index')->name('admin.faqs.index');
        Route::post('create','store')->name('admin.add.faqs');
        Route::post('update','update')->name('admin.faqs.update');
        Route::post('delete','destroy')->name('admin.delete-faqs');
    });

    Route::prefix('specialities')->controller(SpecialityController::class)->group(function(){
        Route::get('/','speciality')->name('admin.speciality.index');  
        Route::post('/specialities','addSpeciality')->name('admin.speciality.add');
        Route::post('/update-specialities','updateSpeciality')->name('admin.update-specailization');  
        Route::delete('/delete/{speciality:id}','deleteSpecialities')->name('admin.delete-specialities');
        Route::get('/get-speciality','getSpecialitiesAjaxCall');  
        Route::get('/create-speciality','storeSpecialityByAjaxCall');  
    });

    Route::prefix('country')->controller(CountryController::class)->group(function(){
        Route::get('/','index')->name('admin.index.country');
        Route::post('country','create')->name('admin.country.add');
        Route::post('update/{country:id}','update')->name('admin.country.update');
        Route::get('delete','deleteCountry')->name('admin.delete-country');
    });
    
    Route::prefix('state')->controller(StateController::class)->group(function(){
        Route::get('/',[StateController::class,'index'])->name('admin.index.state');
        Route::post('create','store')->name('admin.state.add');
        Route::post('update/{state:id}','update')->name('admin.state.update');
        Route::delete('delete/{state:id}','deleteState')->name('admin.delete-state');
        Route::get('get-state-by-country-id','getStateByCountryID')->name('get.state.by.country.id');
    });

    Route::prefix('language')->controller(LanguageController::class)->group(function(){
        Route::get('/','index')->name('admin.index.language');
        Route::get('ajax-create','store')->name('admin.language.add');
    });

    Route::prefix('service')->controller(ServiceController::class)->group(function(){
        Route::get('/','index')->name('admin.service.index');
        Route::post('/create','store')->name('admin.service.add');
        Route::post('/update/{id}','update')->name('admin.service.update');
        Route::get('/delete/{id}','delete')->name('admin.delete-service');
        Route::get('/ajax-create','storeServiceByAjaxCall');
        Route::get('/get-service','getServiceAjaxCall');  
    });

    Route::prefix('doctor')->controller(AdminDoctorController::class)->group(function(){
         Route::get('/','index')->name('admin.index.doctors');
         Route::get('add','addDoctor')->name('admin.add-doctor');
         Route::get('edit/{user:id}','editDoctor')->name('admin.edit-doctor');
         Route::post('add','addPersonalDetails')->name('admin.add-personal-details');
    });

    Route::prefix('doctor')->controller(DoctorEducationController::class)->group(function(){
        Route::post('education','addDoctorEducation')->name('admin.add-doctor-education');
        Route::get('/delete-education', 'destroy')->name('delete.education');
    });

    Route::prefix('doctor')->controller(DoctorAddressController::class)->group(function(){
        Route::post('address','addAddress')->name('admin.add-doctor-address');
    });

    Route::prefix('doctor')->controller(DoctorExperienceController::class)->group(function(){
        Route::post('experience','addDoctorExperience')->name('admin.add-doctor-experience');
        Route::get('/delete-experience', 'destroy')->name('delete.experience');
    });

    Route::prefix('doctor')->controller(DoctorWorkingHourController::class)->group(function(){
        Route::post('working-hour','addDoctorWorkingHour')->name('admin.add-doctor-working-hour');
    });

    Route::prefix('doctor')->controller(DoctorAwardController::class)->group(function(){
        Route::post('award','addDoctorAward')->name('admin.add-doctor-award');
        Route::get('/delete-award', 'destroy')->name('delete.award');
    });

    Route::prefix('course')->controller(CourseController::class)->group(function(){
        Route::get('/','index')->name('admin.index.course');
        Route::get('ajax-create','store')->name('admin.add-course');
    });

    Route::prefix('hospital')->controller(HospitalController::class)->group(function(){
        Route::get('/','index')->name('admin.index.hospital');
        Route::get('ajax-create','store')->name('admin.add-hospital');
    });

    Route::prefix('award')->controller(AwardController::class)->group(function(){
        Route::get('/','index')->name('admin.index.award');
        Route::get('ajax-create','store')->name('admin.add-award');
    });

    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard.index');   
    Route::get('/appointment-list',[AppointmentController::class,'appointmentList'])->name('admin.appointment-list.index'); 
    Route::get('/profile',[ProfileController::class,'profile'])->name('admin.profile.index'); 
    Route::get('/settings',[SettingsController::class,'settings'])->name('admin.settings.index');   

    Route::get('/doctors',[AdmindoctorController::class,'doctors'])->name('admin.doctors.index');   
    Route::get('/patient-list',[PatientlistController::class,'patientList'])->name('admin.patient-list.index');  
    Route::get('/reviews',[AdminController::class,'reviews'])->name('admin.reviews.index'); 
    Route::get('/transactions-list',[TransactionController::class,'transactionsList'])->name('admin.transactions-list.index');  
    Route::get('/invoice-report',[InvoicereportController::class,'invoiceReport'])->name('admin.invoice-report.index');   
    Route::get('/invoice',[InvoicereportController::class,'invoice'])->name('admin.invoice.index');   
});
// =========================== End Admin ================================


// ============================== Frontend =====================
Route::controller(DoctorController::class)->group(function(){
    Route::get('doctor/{user:id}','doctorProfile')->name('frontend.doctor.profile');
});
Route::get('/doctors',[DoctorController::class,'index'])->name('doctors.index');



Route::get('/',[HomeController::class,'home'])->name('home.index');


Route::get('/specialty-list',[SpecialtyPageController::class,'specialty_list'])->name('specialty.list');
Route::get('/specialty-detail/{id}',[SpecialtyPageController::class,'specialty_detail'])->name('specialty.detail');


Route::get('/about',[AboutController::class,'about'])->name('about.index');
Route::get('/faqs',[FaqsController::class,'faqPageIndex'])->name('faqs.index');
Route::get('/contact',[ContactController::class,'contact'])->name('contact.index');
Route::get('/health_monitoring',[HealthmonitoringController::class,'health_monitoring'])->name('health_monitoring.index');
Route::get('/instant',[InstantController::class,'instant'])->name('instant.index');
// Route::get('/login',[LoginController::class,'login'])->name('login.index');
// Route::post('/login',[LoginController::class,'user-Login'])->name('login.userLogin');
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

// ============================== Frontend end =====================


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











