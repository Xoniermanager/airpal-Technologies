<?php

namespace App\Providers;




use App\Models\SiteConfig;
use App\Models\DoctorReview;
use Laravel\Sanctum\Sanctum;
use App\Models\DoctorExperience;
use App\Http\Services\UserServices;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Observers\DoctorReviewObserver;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use App\Observers\ExperienceYearsObserver;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        DoctorExperience::observe(ExperienceYearsObserver::class);
        DoctorReview::observe(DoctorReviewObserver::class);
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        
        view()->composer('*',function($view){
            $bookingServices = app()->make(BookingServices::class); 
            $userServices = app()->make(UserServices::class); 
            $pendingAppointmentsCounter = count($bookingServices->requestedAppointment(Auth::id())->get());

            $doctorDetails   = $userServices->getDoctorDataById(Auth::id());
            view()->share(['appointmentCounter'=>$pendingAppointmentsCounter, 'doctorDetails'=> $doctorDetails]);
        });
        
        // Updating paypal configurations from database
        $paypalConfigs = SiteConfig::whereIN('name',['PAYPAL_SANDBOX_CLIENT_ID','PAYPAL_SANDBOX_CLIENT_SECRET','PAYPAL_LIVE_CLIENT_ID','PAYPAL_LIVE_CLIENT_SECRET','PAYPAL_MODE','PAYPAL_LIVE_APP_ID'])->get();
        foreach($paypalConfigs as $paypalConfig)
        {
            switch ($paypalConfig->name) {
                case 'PAYPAL_MODE':
                    config(['paypal.mode'  =>  $paypalConfig->value]);
                    break;
                case 'PAYPAL_SANDBOX_CLIENT_ID':
                    config(['paypal.sandbox.client_id'  =>  $paypalConfig->value]);
                    break;
                case 'PAYPAL_SANDBOX_CLIENT_SECRET':
                    config(['paypal.sandbox.client_secret'  =>  $paypalConfig->value]);
                    break;
                case 'PAYPAL_LIVE_CLIENT_ID':
                    config(['paypal.live.client_id'  =>  $paypalConfig->value]);
                    break;
                case 'PAYPAL_LIVE_CLIENT_SECRET':
                    config(['paypal.live.client_secret'  =>  $paypalConfig->value]);
                    break;
                case 'PAYPAL_LIVE_APP_ID':
                    config(['paypal.live.app_id'  =>  $paypalConfig->value]);
                    break;
            }
        }
    }
}