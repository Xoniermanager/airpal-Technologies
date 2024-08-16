<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TempController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstantController;
use App\Jobs\UpdateDoctorRatingsAverageValue;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SlotsController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\SpecialtyPageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Doctor\InvoiceController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Doctor\ReviewsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Doctor\DoctorNotification;
use App\Http\Controllers\Patient\BookingController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\HealthmonitoringController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\PatientListController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\DoctorPatientChatController;
use App\Http\Controllers\Admin\InvoiceReportController;
use App\Http\Controllers\Patient\PatientAuthController;
use App\Http\Controllers\Admin\DoctorQuestionController;
use App\Http\Controllers\Patient\DoctorReviewController;
use App\Http\Controllers\Doctor\DiseaseDetailsController;
use App\Http\Controllers\Admin\QuestionsOptionsController;
use App\Http\Controllers\Doctor\AccountsDetailsController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\Patient\PatientProfileController;
use App\Http\Controllers\Doctor\AppointmentConfigController;
use App\Http\Controllers\Doctor\DoctorAppointmentController;
use App\Http\Controllers\DoctorPatientChatHistoryController;
use App\Http\Controllers\Patient\PatientDashboardController;
use App\Http\Controllers\Doctor\DoctorPanelQuestionController;
use App\Http\Controllers\Doctor\DoctorAuthenticationController;
use App\Http\Controllers\Patient\PatientAppointmentsController;
use App\Http\Controllers\Doctor\DoctorSocialMediaAccountsController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Doctor\ProfileController as DoctorProfileController;
use App\Http\Controllers\Admin\{AdminAuthController, AdminReviewController, AdminSocialMediaController, LanguageController, ServiceController, CourseController, HospitalController, AwardController, DoctorAddressController, DoctorAwardController, DoctorEducationController, DoctorExperienceController, DoctorWorkingHourController};
use App\Http\Controllers\Patient\PatientDiaryController;
use App\Http\Controllers\Patient\PatientFavoriteDoctorController;
use App\Http\Controllers\Patient\PatientInvoiceController;

// =============================== Login And SignUp Routes ==================================== //
/**
 * Admin And Patient Panel Login
 */


Route::controller(AdminAuthController::class)->group(function () {
    Route::get('admin/login', 'index')->name('admin.login.index');
    Route::get('admin/logout', 'logout')->name('admin.logout');
});

Route::prefix('doctor')->group(function () {
    Route::controller(DoctorAuthenticationController::class)->group(function () {
        // Route::get('login', 'doctorLogin')->name('doctor.doctor-login.index');
        Route::get('logout', 'logout')->name('doctor.logout');
        Route::get('forget-password', 'forgetPasswordIndex')->name('doctor.forget.password.index');
        Route::post('send-otp', 'forgetPasswordSendOtp')->name('forget.password.send.otp');
        Route::get('reset-password', 'resetPasswordIndex')->name('reset.password.index');
        Route::post('reset-password', 'resetPassword')->name('reset.password');
        Route::post('login', 'userLogin')->name('doctor.doctor-login');
    });
});

// common file for login Admin, Doctor, Patient
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



Route::controller(PatientAuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register.index');
    Route::post('/register', 'signUp')->name('patient.register');
    Route::get('/login', 'login')->name('patient.login.index');
    Route::get('/logout', 'logout')->name('patient.logout');
});

// =============================== End Login And SignUp Routes ==================================== //


Route::controller(DoctorController::class)->group(function () {
    Route::post('update-calender', 'updateCalendar')->name('update.calendar');
    Route::post('get-doctor-slots-by-date', 'getDoctorSlotsByDate')->name('getDoctorSlots.byId');
    Route::get('doctor/success', 'success')->name('success.index');

    Route::get('get-latest-booking-date', 'retrieveLastBookingDate')->name('get.latest.booking.date');
    

});


// Common endpoints
Route::middleware(['auth'])->group(function(){
    Route::controller(DoctorPatientChatHistoryController::class)->group(function(){
        Route::post('chat-history','getSelectedChatHistory')->name('chat.history');
        Route::post('send-message','saveChatMessage')->name('send.message');
    });
});
// =============================== Doctor Panel Start ==================================== //
/**
 * Routes for doctor panel 
 * doctor profile
 */

Route::prefix('doctor')->group(function () {
    Route::middleware(['role:doctor'])->group(function () {
        Route::controller(DoctorDashboardController::class)->group(function () {

            Route::get('dashboard', 'doctorDashboard')->name('doctor.doctor-dashboard.index');
            Route::get('timing', 'doctorTiming')->name('doctor.doctor-timing.index');
            Route::get('change-password', 'doctorChangePassword')->name('doctor.doctor-change-password.index');
            Route::get('specialities', 'doctorSpecialities')->name('doctor.doctor-specialities.index');
            Route::post('/update-latest-appointment-request', 'UpdateLatestAppointmentRequestAjax')->name('updateStatus.appointment.request');
            Route::get('get-appointments-graph-data', 'getAppointmentGraphData')->name('doctor.booking.graphData');
        });

        Route::controller(DoctorProfileController::class)->group(function () {
            Route::get('profile', 'doctorProfile')->name('doctor.doctor-profile.index');
        });
        Route::controller(AccountsDetailsController::class)->group(function () {
            Route::get('accounts', 'doctorAccounts')->name('doctor.doctor-accounts.index');
        });
        Route::controller(DiseaseDetailsController::class)->group(function () {
            Route::get('/disease-details', 'diseaseDetails')->name('doctor.disease-details');
            Route::post('/appointment-query', 'storeAppointmentQueries')->name('doctor.appointment.query');
        });
        Route::controller(PatientController::class)->group(function () {
            Route::get('patient', 'doctorPatient')->name('doctor.doctor-patients.index');
            Route::get('get-search-filter', 'getSearchFilterData')->name('getsearch.filter.data');
        });
        Route::controller(InvoiceController::class)->group(function () {
            Route::get('invoices', 'doctorInvoices')->name('doctor.doctor-invoices.index');
            Route::post('preview-invoice', 'previewInvoice')->name('preview.patient.invoice');
            Route::post('download-invoice', 'downloadInvoice')->name('download.patient.invoice');
            Route::get('revenue-report', 'getRevenueDetailForChart')->name('revenue.report');
        });
        Route::controller(ReviewsController::class)->group(function () {
            Route::get('reviews', 'doctorReviews')->name('doctor.doctor-reviews.index');
        });
        Route::controller(DoctorSocialMediaAccountsController::class)->group(function () {
            Route::get('social', 'doctorSocial')->name('doctor.doctor-social.index');
            Route::post('add-account', 'addSocialMedia')->name('add.social.media.account');
            Route::post('update-account', 'updateSocialMediaAccount')->name('update.social.media.account');
            Route::post('delete-account', 'deleteSocialMediaAccount')->name('delete.social.media.account');
            Route::get('get-social-media-accounts', 'getAllSocialMediaAccounts')->name('get.social.media.account');
        });
        Route::controller(AppointmentConfigController::class)->group(function () {
            Route::get('/appointment-config', 'appointmentConfig')->name('doctor.appointment.config');
            Route::post('/add-appointment-config', 'addAppointmentConfig')->name('doctor.add.appointment.config');
        });
        Route::controller(DoctorNotification::class)->group(function () {
            Route::get('/notifications', 'index')->name('doctor.notification');
        });
        Route::controller(DoctorAppointmentController::class)->group(function () {
            Route::get('appointments', 'doctorAppointments')->name('doctor.appointments.index');
            Route::get('appointment-filter', 'doctorAppointmentFilter')->name('doctor.appointment-filter');
            Route::get('appointment-request', 'appointmentRequests')->name('doctor.doctor-request.index');
            Route::post('update-appointment-status', 'UpdateAppointmentStatus')->name('doctor.status.appointment');
            Route::get('filter-appointment-request', 'filterRequestAppointments')->name('filter.appointment.request');
            Route::get('appointment-search', 'doctorAppointmentSearch')->name('doctor.appointment-search');
        });

        Route::prefix('questions')->controller(DoctorPanelQuestionController::class)->group(function () {
            Route::get('/', 'index')->name('doctor.questions.index');
            Route::post('create', 'store')->name('doctor.add.questions');
            Route::get('get-question-details', 'getQuestionDetailsHTML')->name('doctor.get.question.html');
            Route::post('update', 'update')->name('doctor.questions.update');
            Route::post('delete', 'deleteQuestion')->name('doctor.delete-questions');

            Route::get('doctor-question-filter', 'doctorQuestionFilter')->name('doctor.question.filter');
            Route::get('get-question-by-doctor-id', 'getQuestionByDoctorId')->name('get.question.doctor.id');
        });
        Route::controller(DoctorAuthenticationController::class)->group(function () {
            Route::post('change-password', 'changePassword')->name('doctor.change.password');
        });

        // Doctor Patient Chat
        Route::controller(DoctorPatientChatController::class)->group(function(){
            Route::get('chat','getDoctorAllChats')->name('doctor.chat');
            Route::get('search-chat-patients','searchPatientListInChat')->name('chat.search.patients');
        });
    });
});
// =============================== End Doctor Panel Start ===================================== //



// =============================== Admin Routes Start ================================= //
/**
 * Routes for Admin panel 
 */
Route::prefix('admin')->group(function () {

    Route::prefix('faqs')->controller(FaqsController::class)->group(function () {
        Route::get('/', 'index')->name('admin.faqs.index');
        Route::post('create', 'store')->name('admin.add.faqs');
        Route::post('update', 'update')->name('admin.faqs.update');
        Route::post('delete', 'destroy')->name('admin.delete-faqs');
    });

    Route::prefix('questions')->controller(DoctorQuestionController::class)->group(function () {
        Route::get('/', 'index')->name('admin.questions.index');
        Route::post('create', 'store')->name('admin.add.questions');
        Route::post('update', 'update')->name('admin.questions.update');
        Route::post('delete', 'destroy')->name('admin.delete-questions');
    });

    Route::prefix('questions-options')->controller(QuestionsOptionsController::class)->group(function () {
        Route::get('/', 'index')->name('admin.questions-options.index');
        Route::post('create', 'store')->name('admin.add.questions-options');
        Route::post('update', 'update')->name('admin.questions-options.update');
        Route::post('delete', 'destroy')->name('admin.delete-questions-options');
    });

    Route::prefix('slots')->controller(SlotsController::class)->group(function () {
        Route::get('/', 'index')->name('admin.slots.index');
        Route::post('create', 'store')->name('admin.add.slots');
        Route::post('update', 'update')->name('admin.slots.update');
        Route::post('delete', 'destroy')->name('admin.delete-slot');
        Route::get('getWeekDays', 'getWeekDays');
    });

    Route::prefix('specialities')->controller(SpecialityController::class)->group(function () {
        Route::get('/', 'speciality')->name('admin.speciality.index');
        Route::post('/specialities', 'addSpeciality')->name('admin.speciality.add');
        Route::post('/update-specialities', 'updateSpeciality')->name('admin.update-specailization');
        Route::delete('/delete/{speciality:id}', 'deleteSpecialities')->name('admin.delete-specialities');
        Route::get('/get-speciality', 'getSpecialitiesAjaxCall');
        Route::get('/create-speciality', 'storeSpecialityByAjaxCall');
    });

    Route::prefix('country')->controller(CountryController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index.country');
        Route::post('country', 'create')->name('admin.country.add');
        Route::post('update/{country:id}', 'update')->name('admin.country.update');
        Route::get('delete', 'deleteCountry')->name('admin.delete-country');
    });

    Route::prefix('state')->controller(StateController::class)->group(function () {
        Route::get('/', [StateController::class, 'index'])->name('admin.index.state');
        Route::post('create', 'store')->name('admin.state.add');
        Route::post('update/{state:id}', 'update')->name('admin.state.update');
        Route::delete('delete/{state:id}', 'deleteState')->name('admin.delete-state');
        Route::get('get-state-by-country-id', 'getStateByCountryID')->name('get.state.by.country.id');
    });

    Route::prefix('language')->controller(LanguageController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index.language');
        Route::get('ajax-create', 'store')->name('admin.language.add');
    });

    Route::prefix('service')->controller(ServiceController::class)->group(function () {
        Route::get('/', 'index')->name('admin.service.index');
        Route::post('/create', 'store')->name('admin.service.add');
        Route::post('/update/{id}', 'update')->name('admin.service.update');
        Route::get('/delete/{id}', 'delete')->name('admin.delete-service');
        Route::get('/ajax-create', 'storeServiceByAjaxCall');
        Route::get('/get-service', 'getServiceAjaxCall');
    });

    Route::prefix('doctor')->controller(AdminDoctorController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index.doctors');
        Route::get('add', 'addDoctor')->name('admin.add-doctor');
        Route::get('edit/{user:id}', 'editDoctor')->name('admin.edit-doctor');
        Route::post('add', 'addPersonalDetails')->name('admin.add-personal-details');
    });

    Route::prefix('doctor')->controller(DoctorEducationController::class)->group(function () {
        Route::post('education', 'addDoctorEducation')->name('admin.add-doctor-education');
        Route::get('/delete-education', 'destroy')->name('delete.education');
    });

    Route::prefix('doctor')->controller(DoctorAddressController::class)->group(function () {
        Route::post('address', 'addAddress')->name('admin.add-doctor-address');
    });

    Route::prefix('doctor')->controller(DoctorExperienceController::class)->group(function () {
        Route::post('experience', 'addDoctorExperience')->name('admin.add-doctor-experience');
        Route::get('/delete-experience', 'destroy')->name('delete.experience');
    });

    Route::prefix('doctor')->controller(DoctorWorkingHourController::class)->group(function () {
        Route::post('working-hour', 'addDoctorWorkingHour')->name('admin.add-doctor-working-hour');
    });

    Route::prefix('doctor')->controller(DoctorAwardController::class)->group(function () {
        Route::post('award', 'addDoctorAward')->name('admin.add-doctor-award');
        Route::get('/delete-award', 'destroy')->name('delete.award');
    });

    Route::prefix('course')->controller(CourseController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index.course');
        Route::get('ajax-create', 'store')->name('admin.add-course');
    });

    Route::prefix('hospital')->controller(HospitalController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index.hospital');
        Route::get('ajax-create', 'store')->name('admin.add-hospital');
    });

    Route::prefix('award')->controller(AwardController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index.award');
        Route::get('ajax-create', 'store')->name('admin.add-award');
    });

    Route::prefix('social-media')->controller(AdminSocialMediaController::class)->group(function () {
        Route::get('/', 'index')->name('admin.social.media.index');
        Route::post('add', 'store')->name('admin.social-media.add');
        Route::get('get-all-social-media-type', 'getAllSocialMediaType')->name('admin.get.all.social.media.type');
        Route::post('edit', 'update')->name('admin.social-media.update');
        Route::get('delete', 'destroy')->name('admin.social-media.type.delete');
    });

    Route::controller(PatientListController::class)->group(function () {
        Route::get('patient-list', 'patientList')->name('admin.patient-list.index');
        Route::post('filter-patients-by-doctor', 'getPatientListByDoctor')->name('filter.patients.by.doctor');
    });

    Route::controller(AdminReviewController::class)->group(function(){
        Route::get('/reviews', 'reviews')->name('admin.reviews.index');
        Route::post('/delete-review', 'deleteReviews')->name('admin.delete.review');
    });


    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard.index');
    Route::get('/appointment-list', [AppointmentController::class, 'appointmentList'])->name('admin.appointment-list.index');

    Route::get('/profile/{user:id}', [ProfileController::class, 'profile'])->name('admin.profile.index');
    Route::get('/settings', [SettingsController::class, 'settings'])->name('admin.settings.index');


    Route::get('/transactions-list', [TransactionController::class, 'transactionsList'])->name('admin.transactions-list.index');
    Route::get('/invoice-report', [InvoiceReportController::class, 'invoiceReport'])->name('admin.invoice-report.index');
    Route::get('/invoice', [InvoiceReportController::class, 'invoice'])->name('admin.invoice.index');
});

// =========================== End Admin Routes Start ================================= //

// =========================== Patient Panel Start ===================== //
Route::get('check-review',[BookingController::class, 'checkReviewByPatientId'])->name('check.review')->middleware('auth');

Route::prefix('patients')->group(function () {
    Route::middleware(['role:patient'])->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::controller(BookingController::class)->group(function () {
                Route::post('patient-booking', 'patientBooking')->name('patient.booking');
                Route::get('/check-auth', 'checkAuth')->name('check.auth');
            });
            // Patient Dashboard Routes
            Route::controller(PatientDashboardController::class)->group(function () {
                Route::get('dashboard', 'patientDashboard')->name('patient-dashboard.index');
                Route::get('accounts', 'patientAccounts')->name('patient-accounts.index');
                Route::get('dependant', 'patientDependant')->name('patient-dependant.index');
                Route::get('patient-heartbeat-graph-data', 'patientHeartbeatGraphData')->name('patient-heartbeat.graph.data');
                Route::get('patient-blood-pressure-graph-data', 'patientBloodPressureGraphData')->name('patient-blood-pressure.graph.data');

            });
            // Patient Appointments Routes
            Route::controller(PatientAppointmentsController::class)->group(function () {
                Route::get('appointments', 'patientAppointments')->name('patient-appointments.index');
                Route::get('appointment-details', 'patientAppointmentDetails')->name('patient-appointment-details.index');
                Route::get('patient-appointment-filter', 'patientAppointmentFilter')->name('patient.appointment.filter');
            });

            Route::controller(PatientInvoiceController::class)->group(function () {
                Route::get('invoices', 'index')->name('patient-invoices.index');
                Route::get('get-patient-invoices', 'getPatientInvoices')->name('get.patient.invoices');
            });

            Route::controller(PatientAuthController::class)->group(function () {
                Route::get('change-password', 'changePasswordIndex')->name('patient.change-password.index');
                Route::post('patient-change-password', 'patientChangePassword')->name('patient.change.password.index');
            });

            Route::controller(PatientFavoriteDoctorController::class)->group(function () {
                Route::get('favorite', 'index')->name('patient.favorite.index');
                // Route::get('favorite-doctors', 'getFavoriteDoctors');
                // Route::post('add/favorite', 'addFavorite');
                Route::post('remove/favorite', 'removeFavorite')->name('remove.doctor.favorite.list');
            });

            // Patient Profile Routes
            Route::controller(PatientProfileController::class)->group(function () {
                Route::get('settings', 'patientSettings')->name('patient-settings.index');
                Route::get('profile', 'patientProfile')->name('patient-profile.index');
                Route::post('profile-update', 'patientProfileUpdate')->name('patient-profile.update');
            });
            Route::controller(TempController::class)->group(function () {
                Route::get('dependant', 'dependant')->name('patient.dependant.index');
                Route::get('medical-records', 'medicalRecords')->name('patient.medical-records.index');
                Route::get('medical-details', 'medicalDetails')->name('patient.medical-details.index');
            });

            //Diary Module
            Route::controller(PatientDiaryController::class)->group(function () {
                Route::get('index-diary', 'index')->name('patient.diary.index');
                Route::get('add-diary', 'addDiary')->name('patient.diary.add');
                Route::post('create-diary', 'createDiary')->name('patient.diary.create');
                Route::get('edit-diary/{patient_diaries:id}', 'editDiary')->name('patient.diary.edit');
                Route::get('get-filter-diary-details', 'getSearchFilterDiaryDetails')->name('patient.diary.filters');
            });

            // Doctor Patient Chat
            Route::controller(DoctorPatientChatController::class)->group(function(){
                Route::get('chat','getPatientAllChats')->name('patient.chat');
                Route::get('search-chat-doctors','searchDoctorListInChat')->name('chat.search.doctors');
            });
        });
    });
});

// ============================== End Patient Panel Start ===================== //


// =========================== Frontend Website Routes ===================== //
Route::controller(DoctorController::class)->group(function () {
    Route::get('doctor/{user:id}', 'doctorProfile')->name('frontend.doctor.profile');
});
Route::get('/search-doctor', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/search', [DoctorController::class, 'search'])->name('doctors.search');
Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/specialty-list', [SpecialtyPageController::class, 'specialty_list'])->name('specialty.list');
Route::get('/specialty-detail/{id}', [SpecialtyPageController::class, 'specialty_detail'])->name('specialty.detail');
Route::get('/about', [AboutController::class, 'about'])->name('about.index');
Route::get('/faqs', [FaqsController::class, 'faqPageIndex'])->name('faqs.index');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact.index');
Route::get('/health_monitoring', [HealthMonitoringController::class, 'health_monitoring'])->name('health_monitoring.index');
Route::get('/instant', [InstantController::class, 'instant'])->name('instant.index');
// Route::post('/register', [RegisterController::class, 'userRegister'])->name('register.userRegister');
Route::get('/privacy', [FrontController::class, 'privacy'])->name('privacy.index');
Route::get('/term', [FrontController::class, 'term'])->name('term.index');
Route::get('/appointment/doctor/{id}', [DoctorController::class, 'appointment'])->name('appointment.index');
Route::get('/invoice', [FrontController::class, 'invoice'])->name('invoice.index');
Route::get('/patient_details', [FrontController::class, 'patient_details'])->name('patient_details.index');
Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout.index');

Route::controller(DoctorReviewController::class)->group(function () {
    Route::post('add-doctor-review', 'addDoctorReview')->name('add.doctor.review');
    Route::get('get-all-review', 'getAllReview')->name('get.all.review');
});

Route::get('job', function () {
    UpdateDoctorRatingsAverageValue::dispatch();
    return 'job executes';
});
// ============================== End Frontend Website Routes ===================== //
