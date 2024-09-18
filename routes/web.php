<?php

use App\Models\OurTeam;
use App\Models\PaypalConfig;
use App\Jobs\UpdateMeetingIdJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TempController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstantController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentController;
use App\Jobs\UpdateDoctorRatingsAverageValue;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\PayPalController;
use App\Http\Controllers\FrontendPageController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\SpecialtyPageController;
use App\Http\Controllers\Doctor\InvoiceController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Doctor\ReviewsController;
use App\Http\Controllers\FrontendDoctorController;
use App\Http\Controllers\Admin\AdminChatController;
use App\Http\Controllers\Doctor\DoctorNotification;
use App\Http\Controllers\Doctor\DoctorPaypalConfig;
use App\Http\Controllers\Patient\BookingController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\HealthmonitoringController;
use App\Http\Controllers\Admin\PatientListController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\DoctorPatientChatController;
use App\Http\Controllers\Admin\InvoiceReportController;
use App\Http\Controllers\Doctor\PrescriptionController;
use App\Http\Controllers\Patient\PatientAuthController;
use App\Http\Controllers\Admin\DoctorQuestionController;
use App\Http\Controllers\Patient\DoctorReviewController;
use App\Http\Controllers\Patient\PatientDiaryController;
use App\Http\Controllers\Doctor\DiseaseDetailsController;
use App\Http\Controllers\Patient\MedicalRecordController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Doctor\AccountsDetailsController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\Patient\PatientInvoiceController;
use App\Http\Controllers\Patient\PatientPaymentController;
use App\Http\Controllers\Patient\PatientProfileController;
use App\Http\Controllers\Doctor\AppointmentConfigController;
use App\Http\Controllers\Doctor\DoctorAppointmentController;
use App\Http\Controllers\DoctorPatientChatHistoryController;
use App\Http\Controllers\Patient\PatientDashboardController;
use App\Http\Controllers\Doctor\DoctorPaypalConfigController;
use App\Http\Controllers\Doctor\DoctorPanelQuestionController;
use App\Http\Controllers\Doctor\DoctorAuthenticationController;
use App\Http\Controllers\Patient\PatientAppointmentsController;
use App\Http\Controllers\Admin\DoctorAppointmentConfigController;
use App\Http\Controllers\Patient\PatientFavoriteDoctorController;
use App\Http\Controllers\Doctor\DoctorSocialMediaAccountsController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Doctor\ProfileController as DoctorProfileController;
use App\Http\Controllers\Admin\{AdminAuthController, AdminDashboardController, AdminReviewController, AdminSiteConfigController, AdminSocialMediaController, LanguageController, ServiceController, CourseController, HospitalController, AwardController, DoctorAddressController, DoctorAwardController, DoctorEducationController, DoctorExperienceController, DoctorWorkingHourController, TestimonialController};

// =============================== Login And SignUp Routes ==================================== //
/**
 * Admin And Patient Panel Login
 */
Route::controller(AdminAuthController::class)->group(function () {
    Route::get('admin/login', 'index')->name('admin.login.index');
    Route::post('admin/login', 'login')->name('admin.login');
    Route::get('admin/logout', 'logout')->name('admin.logout');
});

// Paypal Payment endpoints
// Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
Route::get('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
Route::get('paypal/payment/success', [PaymentController::class, 'paymentSuccess'])->name('paypal.payment.success');
Route::get('paypal/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('paypal.payment/cancel');
Route::get('booking/success', [BookingController::class, 'bookingSuccess'])->name('booking.success');
Route::get('booking/error', [BookingController::class, 'bookingError'])->name('booking.error');


// common file for login Admin, Doctor, Patient
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout')->name('logout');

    Route::get('/login', 'index')->name('login.index');
    Route::get('forget-password', 'forgetPasswordIndex')->name('doctor.forget.password.index');
    Route::post('send-otp', 'forgetPasswordSendOtp')->name('forget.password.send.otp');
    
    Route::get('reset-password', 'resetPasswordIndex')->name('reset.password.index');
    Route::post('reset-password', 'resetPassword')->name('reset.password');

    Route::get('verify-otp', 'verifyOtpIndex')->name('verify.otp.index');
    Route::post('verify-otp','verifyOtp')->name('verify.otp');
    Route::post('resend-otp', 'resendOtp')->name('resend.otp');
});

// patient registration
Route::controller(PatientAuthController::class)->group(function () {
    Route::get('patient/register', 'register')->name('register.index');
    Route::post('/register', 'signUp')->name('patient.register');
    Route::get('/logout', 'logout')->name('patient.logout');
});

// doctor registration
Route::prefix('doctor')->group(function () {
    Route::controller(AdminDoctorController::class)->group(function () {
        Route::post('add', 'addPersonalDetails')->name('admin.add-personal-details');
    });
});

// common route for doctor and admin (Unauthenticated routes)
Route::prefix('language')->controller(LanguageController::class)->group(function () {
    Route::get('/', 'index')->name('admin.index.language');
});
Route::prefix('service')->controller(ServiceController::class)->group(function () {
    Route::get('/get-service', 'getServiceAjaxCall');
});
Route::prefix('specialities')->controller(SpecialityController::class)->group(function () {
    Route::get('/get-speciality', 'getSpecialitiesAjaxCall');
});


// =============================== End Login And SignUp Routes ==================================== //
Route::controller(FrontendDoctorController::class)->group(function () {
    Route::post('update-calender', 'updateCalendar')->name('update.calendar');
    Route::post('get-doctor-slots-by-date', 'getDoctorSlotsByDate')->name('getDoctorSlots.byId');
    Route::get('doctor/success', 'success')->name('success.index');
    Route::get('get-latest-booking-date', 'retrieveLastBookingDate')->name('get.latest.booking.date');
});

// Common endpoints
Route::middleware(['auth'])->group(function () {
    Route::controller(DoctorPatientChatHistoryController::class)->group(function () {
        Route::post('chat-history', 'getSelectedChatHistory')->name('chat.history');
        Route::post('send-message', 'saveChatMessage')->name('send.message');
    });
    Route::controller(PrescriptionController::class)->group(function () {
        Route::get('/download-pdf/{prescriptions:id}', 'downloadPrescriptionPdf')->name('prescription.pdf.download');
    });
});

Route::controller(DiseaseDetailsController::class)->group(function () {
    Route::get('/disease-details', 'diseaseDetails')->name('doctor.disease-details');
    Route::post('/appointment-query', 'storeAppointmentQueries')->name('doctor.appointment.query');
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
            Route::get('get-appointments-graph-data', action: 'getAppointmentGraphData')->name('doctor.booking.graphData');
        });

        Route::controller(DoctorProfileController::class)->group(function () {
            Route::get('profile', 'doctorProfile')->name('doctor.doctor-profile.index');
        });
        Route::controller(AccountsDetailsController::class)->group(function () {
            Route::get('accounts', 'doctorAccounts')->name('doctor.doctor-accounts.index');
            Route::get('patient-account-search-filter', 'searchFilterDetails')->name('doctor-accounts.searchFilter');
        });

        Route::controller(PatientController::class)->group(function () {
            Route::get('patient', 'doctorPatient')->name('doctor.doctor-patients.index');
            Route::get('get-search-filter', 'getSearchFilterData')->name('getsearch.filter.data');
            Route::get('patient-profile/{id}', 'patientProfile')->name('doctor-patient-profile');
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
            Route::post('/update-appointment-config/{doctor_appointment_config:id}', 'updateAppointmentConfig')->name('doctor.update.appointment.config');
            Route::get('all-appointment-configs', 'allAppointmentConfig')->name('doctor.all.appointment.config');
            Route::get('/delete-appointment-config/{doctor_appointment_config:id}', 'deleteAppointmentConfig')->name('doctor.delete.appointment.config');
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
            Route::get('appointment-details', 'patientAppointmentsDetails')->name('patient-appointment-details.index');
            Route::get('all-complete-appointment', 'allCompleteAppointment')->name('doctor.all.complete.appointment');
        });

        // these routes are used for with auth attempt
        Route::controller(DoctorAuthenticationController::class)->group(function () {
            Route::post('change-password', 'changePassword')->name('doctor.change.password');
            Route::get('logout', 'logout')->name('doctor.logout');
        });

        // Doctor Patient Chat
        Route::controller(DoctorPatientChatController::class)->group(function () {
            Route::get('chat', 'getDoctorAllChats')->name('doctor.chat');
            Route::get('search-chat-patients', 'searchPatientListInChat')->name('chat.search.patients');
        });

        //Prescription for patient
        Route::prefix('prescription')->controller(PrescriptionController::class)->group(function () {
            Route::get('/index', 'index')->name('prescription.index');
            Route::get('/add', 'add')->name('prescription.add');
            Route::post('/create', 'create')->name('prescription.create');
            Route::get('/edit/{prescriptions:id}', 'edit')->name('prescription.edit');
            Route::get('/view/{prescriptions:id}', 'view')->name('prescription.view');
            Route::post('/update/{prescriptions:id}', 'update')->name('prescription.update');
            Route::get('/delete/{prescriptions:id}', 'delete')->name('prescription.delete');
            Route::get('/delete/medicine-details/{prescription_medicine_details:id}', 'deleteMedicine');
            Route::get('/delete/test-details/{prescription_tests:id}', 'deletePrescriptionTest');
            Route::get('/search/filter', 'searchFilterPrescriptionDetails')->name('prescription.search.filter');
            Route::get('/get-booking-details-patient', 'getAllBookingDetailsByPatient')->name('get.booking.details.patient');
        });

        Route::prefix('paypal')->controller(DoctorPaypalConfigController::class)->group(function () {
            Route::get('/', 'index')->name('paypal.index');
            Route::post('create', 'store')->name('add.doctor.paypal.account.detail');
        });
    });
});
// =============================== End Doctor Panel Start ===================================== //


// common route for doctor and admin
Route::middleware(['auth'])->group(function () {

    Route::prefix('language')->controller(LanguageController::class)->group(function () {
        Route::get('ajax-create', 'store')->name('admin.language.add');
    });

    Route::prefix('service')->controller(ServiceController::class)->group(function () {
        Route::get('/ajax-create', 'storeServiceByAjaxCall');
    });

    Route::prefix('specialities')->controller(SpecialityController::class)->group(function () {
        Route::get('/create-speciality', 'storeSpecialityByAjaxCall');
    });

    Route::prefix('slots')->controller(DoctorAppointmentConfigController::class)->group(function () {
        Route::get('getWeekDays', 'getWeekDays');
    });

    Route::prefix('doctor')->group(function () {
        // DoctorEducationController routes
        Route::controller(DoctorEducationController::class)->group(function () {
            Route::post('education', 'addDoctorEducation')->name('admin.add-doctor-education');
            Route::get('delete-education', 'destroy')->name('delete.education');
        });

        // DoctorAddressController routes
        Route::controller(DoctorAddressController::class)->group(function () {
            Route::post('address', 'addAddress')->name('admin.add-doctor-address');
        });

        // DoctorExperienceController routes
        Route::controller(DoctorExperienceController::class)->group(function () {
            Route::post('experience', 'addDoctorExperience')->name('admin.add-doctor-experience');
            Route::get('delete-experience', 'destroy')->name('delete.experience');
        });

        // DoctorWorkingHourController routes
        Route::controller(DoctorWorkingHourController::class)->group(function () {
            Route::post('working-hour', 'addDoctorWorkingHour')->name('admin.add-doctor-working-hour');
        });

        // DoctorAwardController routes
        Route::controller(DoctorAwardController::class)->group(function () {
            Route::post('award', 'addDoctorAward')->name('admin.add-doctor-award');
            Route::get('delete-award', 'destroy')->name('delete.award');
        });

        Route::prefix('questions')->controller(DoctorPanelQuestionController::class)->group(function () {
            Route::get('/', 'index')->name('doctor.questions.index');
            Route::post('create', 'store')->name('doctor.add.questions');
            Route::get('get-question-details', 'getQuestionDetailsHTML')->name('doctor.get.question.html');
            Route::post('update', 'update')->name('doctor.questions.update');
            Route::post('delete', 'deleteQuestion')->name('doctor.delete-questions');
            Route::post('option-delete', 'destroy')->name('doctor.delete-questions-options');

            Route::get('doctor-question-filter', 'doctorQuestionFilter')->name('doctor.question.filter');
            Route::get('get-question-by-doctor-id', 'getQuestionByDoctorId')->name('get.question.doctor.id');
        });
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
});


// =============================== Admin Routes Start ================================= //
/**
 * Routes for Admin panel
 */
Route::prefix('admin')->group(function () {

    // admin routes
    Route::middleware(['role:admin'])->group(function () {

        Route::prefix('page')->controller(PageController::class)->group(function () {
            Route::get('home/{page:id}', 'home')->name('admin.home.index');
            Route::post('store-home-page-detail', 'storeHomePageDetail')->name('admin.store.home.page.detail');

            Route::get('about-us/{page:id}', 'aboutUs')->name('admin.about_us.index');
            Route::post('store-about-us-page-detail', 'storeAboutUsPageDetail')->name('admin.store.about_us.page.detail');

            Route::get('health-monitoring/{page:id}', 'healthMonitoring')->name('admin.health.monitoring.index');
            Route::post('store-health-monitoring-page-detail', 'storeHealthMonitoringPageDetail')->name('admin.store.health.monitoring.page.detail');

            Route::get('instant-consultation/{page:id}', 'instantConsultation')->name('admin.instant.consultation.index');
            Route::post('store-instant-consultation', 'storeInstantConsultation')->name('admin.store.instant.consultation');

            Route::post('save-page-extra-sections', 'savePageExtraSection')->name('admin.save.page.extra.sections');
        });


        Route::controller(AdminDashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('admin.dashboard.index');
            Route::get('get-appointments-graph-data-for-admin', 'getAppointmentGraphDataAdmin')->name('doctor.booking.graphData.admin');
            Route::get('get-revenue-graph-data-for-admin', 'getRevenueGraphDataAdmin')->name('doctor.revenue.graphData.admin');
        });
        Route::prefix('doctor')->group(function () {
            // AdminDoctorController routes
            Route::controller(AdminDoctorController::class)->group(function () {
                Route::get('/', 'index')->name('admin.index.doctors');
                Route::get('add', 'addDoctor')->name('admin.add-doctor');
                Route::get('edit/{user:id}', 'editDoctor')->name('admin.edit-doctor');
                Route::get('searching-doctor', 'searching')->name('admin.searching.doctor');
            });
        });

        Route::prefix('slots')->controller(DoctorAppointmentConfigController::class)->group(function () {
            Route::get('/', 'index')->name('admin.slots.index');
            Route::post('create', 'store')->name('admin.add.slots');
            Route::post('update-config/{doctor_appointment_config:id}', 'updateSlot')->name('doctor.update.appointment.config');
            Route::post('delete', 'destroy')->name('admin.delete-slot');
            Route::get('get-doctor-slot-details/{users:id}', 'getDocotorSlotDetails');
        });
        Route::prefix('specialities')->controller(SpecialityController::class)->group(function () {
            Route::get('/', 'speciality')->name('admin.speciality.index');
            Route::post('/specialities', 'addSpeciality')->name('admin.speciality.add');
            Route::post('/update-specialities', 'updateSpeciality')->name('admin.update-specailization');
            Route::delete('/delete/{speciality:id}', 'deleteSpecialities')->name('admin.delete-specialities');
        });

        Route::prefix('service')->controller(ServiceController::class)->group(function () {
            Route::get('/', 'index')->name('admin.service.index');
            Route::post('/create', 'store')->name('admin.service.add');
            Route::post('/update/{id}', 'update')->name('admin.service.update');
            Route::get('/delete/{id}', 'delete')->name('admin.delete-service');
        });

        Route::prefix('questions')->controller(DoctorQuestionController::class)->group(function () {
            Route::get('/', 'index')->name('admin.questions.index');
            Route::post('create', 'store')->name('admin.add.questions');
            Route::post('update', 'update')->name('admin.questions.update');
            Route::post('delete', 'destroy')->name('admin.delete-questions');
        });

        Route::prefix('faqs')->controller(FaqsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.faqs.index');
            Route::post('create', 'store')->name('admin.add.faqs');
            Route::post('update', 'update')->name('admin.faqs.update');
            Route::post('delete', 'destroy')->name('admin.delete-faqs');
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

        Route::prefix('social-media')->controller(AdminSocialMediaController::class)->group(function () {
            Route::get('/', 'index')->name('admin.social.media.index');
            Route::post('add', 'store')->name('admin.social-media.add');
            Route::get('get-all-social-media-type', 'getAllSocialMediaType')->name('admin.get.all.social.media.type');
            Route::post('edit', 'update')->name('admin.social-media.update');
            Route::get('delete', 'destroy')->name('admin.social-media.type.delete');
        });

        Route::controller(PatientListController::class)->group(function () {
            Route::get('patients', 'patientList')->name('admin.patient-list.index');
            Route::post('filter-patients-by-doctor', 'getPatientListByDoctor')->name('filter.patients.by.doctor');
        });

        Route::controller(AdminReviewController::class)->group(function () {
            Route::get('/reviews', 'reviews')->name('admin.reviews.index');
            Route::post('/delete-review', 'deleteReviews')->name('admin.delete.review');
        });

        Route::get('/appointments', [AdminAppointmentController::class, 'appointmentList'])->name('admin.appointment-list.index');
        Route::get('admin-appointment-filter',  [AdminAppointmentController::class, 'appointmentFilter'])->name('admin.appointment-filter');

        Route::get('/profile/{user:id}', [ProfileController::class, 'profile'])->name('admin.profile.index');
        Route::get('/settings', [AdminSiteConfigController::class, 'settings'])->name('admin.settings.index');

        Route::get('/transactions-list', [TransactionController::class, 'transactionsList'])->name('admin.transactions-list.index');
        Route::get('/invoice-report', [InvoiceReportController::class, 'invoiceReport'])->name('admin.invoice-report.index');
        Route::get('/invoice', [InvoiceReportController::class, 'invoice'])->name('admin.invoice.index');

        Route::get('/invoice', [InvoiceReportController::class, 'invoice'])->name('admin.invoice.index');


        Route::prefix('testimonial')->controller(TestimonialController::class)->group(function () {
            Route::get('/', 'index')->name('admin.testimonial.index');
            Route::get('get', 'getTestimonials')->name('admin.testimonial.list');
            Route::get('add', 'showTestimonialForm')->name('admin.show.testimonial.form');
            Route::get('edit/{id}', 'editTestimonialForm')->name('admin.edit.testimonial.form');
            Route::post('update', 'updateTestimonial')->name('admin.update.testimonial.form');
            Route::get('delete/{id}', 'deleteTestimonial')->name('admin.delete.testimonial.form');
            Route::post('save-testimonial', 'saveTestimonial')->name('admin.save.testimonial.form');
        });


        Route::prefix('our-team')->controller(OurTeamController::class)->group(function () {
            Route::get('/', 'index')->name('admin.our.team.index');
            Route::get('get', 'getOurTeam')->name('admin.our.team.list');
            Route::get('add', 'showOurTeamForm')->name('admin.show.our.team.form');
            Route::get('edit/{id}', 'editOurTeamForm')->name('admin.edit.our.team.form');
            Route::post('update', 'updateOurTeam')->name('admin.update.our.team.form');
            Route::get('delete/{id}', 'deleteOurTeam')->name('admin.delete.our.team.form');
            Route::post('save-our-team', 'saveOurTeam')->name('admin.save.our.team.form');
        });

        Route::prefix('partners')->controller(PartnerController::class)->group(function () {
            Route::get('/', 'index')->name('admin.partner.index');
            Route::get('get', 'getPartners')->name('admin.partner.list');
            Route::get('add', 'showPartnerForm')->name('admin.show.partner.form');
            Route::get('edit/{id}', 'editPartnerForm')->name('admin.edit.partner.form');
            Route::post('update/{id}', 'updatePartner')->name('admin.update.partner.form');
            Route::get('delete/', 'deletePartner')->name('admin.delete.partner.form');
            Route::post('save-partner', 'savePartner')->name('admin.save.partner.form');
        });

        // Admin Chat with doctors and patients
        Route::controller(AdminChatController::class)->group(function () {
            Route::get('chat', 'getChatList')->name('admin.chat');
            Route::get('search-chat-user', 'searchChatUser')->name('chat.search.user');
            Route::get('chat-history', 'getChatHistory')->name('chat.history');
        });
    });
});

// =========================== End Admin Routes Start ================================= //

// =========================== Patient Panel Start ===================== //
Route::get('check-review', [BookingController::class, 'checkReviewByPatientId'])->name('check.review')->middleware('auth');

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
                // Route::get('dependant', 'patientDependant')->name('patient-dependant.index');

                Route::get('patient-heartbeat-graph-data', 'patientHeartbeatGraphData')->name('patient-heartbeat.graph.data');
                Route::get('patient-blood-pressure-graph-data', 'patientBloodPressureGraphData')->name('patient-blood-pressure.graph.data');
                Route::get('patient-body-temp-graph-data', 'patientBodyTempGraphData')->name('patient-body-temp.graph.data');
                Route::get('patient-body-glucose-graph-data', 'patientGlucoseGraphData')->name('patient-body-glucose.graph.data');
                Route::get('patient-body-oxygen-graph-data', 'patientOxygenGraphData')->name('patient-body-oxygen.graph.data');
            });
            Route::controller(PatientPaymentController::class)->group(function () {
                Route::get('accounts', 'patientAccounts')->name('patient-accounts.index');
                Route::get('accounts-search-filter', 'searchFilterDetails')->name('patient-accounts.searchFilter');
            });
            // Patient Appointments Routes
            Route::controller(PatientAppointmentsController::class)->group(function () {
                Route::get('appointments', 'patientAppointments')->name('patient-appointments.index');
                Route::get('appointment-details', 'patientAppointmentDetails')->name('patient-appointment-details.index');
                Route::get('patient-appointment-filter', 'patientAppointmentFilter')->name('patient.appointment.filter');
                Route::get('view-prescripton-{prescriptions:id}', 'viewPrescription')->name('patient.prescription.view');
                Route::get('get-complete-appointment', 'getAllCompleteAppointment')->name('patient.complete.appointment');
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
                Route::post('update-favorite', 'update')->name('patient.update.favorite');
                Route::post('remove-favorite', 'removeFavorite')->name('remove.doctor.favorite.list');
            });

            // Patient Profile Routes
            Route::controller(PatientProfileController::class)->group(function () {
                Route::get('settings', 'patientSettings')->name('patient-settings.index');
                Route::get('profile', 'patientProfile')->name('patient-profile.index');
                Route::post('profile-update', 'patientProfileUpdate')->name('patient-profile.update');
            });
            // Medical Record
            Route::controller(MedicalRecordController::class)->prefix('medical-records')->group(function () {
                Route::get('list', 'medicalRecordsList')->name('patient.medical-records.index');
                Route::get('add', 'addMedicalRecord')->name('patient.medical-records.add');
                Route::post('add', 'createMedicalRecord')->name('patient.medical-records.create');
                Route::get('edit/{medical_records:id}', 'editMedicalRecord')->name('patient.medical-records.edit');
                Route::post('update/{medical_records:id}', 'updateMedicalRecord')->name('patient.medical-records.update');
                Route::get('delete/{medical_records:id}', 'deleteMedicalRecord');
                Route::get('get-booking-details/{booking_slots:id}', 'getBookingDetails');
                Route::get('medical-records-filter', 'searchFilterMedicalRecord')->name('medical.records.filtering');
            });

            //Diary Module
            Route::controller(PatientDiaryController::class)->prefix('diary')->group(function () {
                Route::get('index', 'index')->name('patient.diary.index');
                Route::get('add', 'addDiary')->name('patient.diary.add');
                Route::post('add', 'createDiary')->name('patient.diary.create');
                Route::get('edit/{patient_diaries:id}', 'editDiary')->name('patient.diary.edit');
                Route::get('get-filter-diary-details', 'getSearchFilterDiaryDetails')->name('patient.diary.filters');
            });

            // Doctor Patient Chat
            Route::controller(DoctorPatientChatController::class)->group(function () {
                Route::get('chat', 'getPatientsChatList')->name('patient.chat');
                Route::get('search-chat-doctors', 'searchDoctorListInChat')->name('chat.search.doctors');
            });
        });
    });
});

// ============================== End Patient Panel Start ===================== //


// =========================== Frontend Website Routes ===================== //

Route::controller(FrontendDoctorController::class)->group(function () {
    Route::get('doctor/{user:id}', 'doctorProfile')->name('frontend.doctor.profile');
    Route::get('/appointment/doctor/{id}', 'appointment')->name('appointment.index');

    // To load doctors with filters fro the first time
    Route::get('/search-doctor', 'getDoctorsListWithFilters')->name('doctors.index');

    // To update doctors list based on selected filters
    Route::get('/search', 'search')->name('doctors.search');

    Route::get('generateAllInvoices', 'generateAllInvoices')->name('generate.all.invoices');
    Route::get('select-role', 'choose')->name('choose');
    Route::get('doctor-register', 'doctorRegistrationIndex')->name('doctor.register.index');
});
Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/specialty-list', [SpecialtyPageController::class, 'specialty_list'])->name('specialty.list');
Route::get('/specialty-detail/{id}', [SpecialtyPageController::class, 'specialty_detail'])->name('specialty.detail');
Route::get('/about', [AboutController::class, 'about'])->name('about.index');
Route::get('/faqs', [FaqsController::class, 'faqPageIndex'])->name('faqs.index');

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact.index');
    Route::post('/send-mail', 'contactUs')->name('contact.us');
    Route::get('/thank-you', 'thankYou')->name('thank.you');
});

Route::get('/health_monitoring', [HealthMonitoringController::class, 'health_monitoring'])->name('health_monitoring.index');

Route::get('/instant', [InstantController::class, 'instant'])->name('instant.index');
Route::post('/instant-mail-send', [InstantController::class, 'instantSendMail'])->name('send.instant.mail.index');

Route::controller(FrontController::class)->group(function () {
    Route::get('/privacy', 'privacy')->name('privacy.index');
    Route::get('/term', 'term')->name('term.index');
    Route::get('/invoice', 'invoice')->name('invoice.index');
    Route::get('/patient_details', 'patient_details')->name('patient_details.index');
    Route::get('/checkout', 'checkout')->name('checkout.index');
});

Route::controller(DoctorReviewController::class)->group(function () {
    Route::post('add-doctor-review', 'addDoctorReview')->name('add.doctor.review');
    Route::get('get-all-review', 'getAllReview')->name('get.all.review');
});

Route::get('/gdpr-policy', action: [FrontendPageController::class, 'gdprPolicy'])->name('gdpr.policy.index');
Route::get('/cookie-policy', action: [FrontendPageController::class, 'cookiePolicy'])->name('cookie.policy.index');
Route::get('/insurance-policy', action: [FrontendPageController::class, 'insurancePolicy'])->name('insurance.policy.index');


Route::get('job', function () {
    // UpdateDoctorRatingsAverageValue::dispatch();
    UpdateMeetingIdJob::dispatch();
    return 'job executes';
});


Route::controller(AdminSiteConfigController::class)->group(function () {
    Route::post('add', 'addWebsiteConfig')->name('add.website.configs');
});

Route::controller(FrontendDoctorController::class)->group(function () {
    Route::get('generateAllInvoices', 'generateAllInvoices')->name('generate.all.invoices');
});

// ============================== End Frontend Website Routes ===================== //
