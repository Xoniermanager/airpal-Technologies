<?php

namespace App\Providers;




use Laravel\Sanctum\Sanctum;
use App\Models\DoctorExperience;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\UserServices;
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
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        
        view()->composer('*',function($view){
            $bookingServices = app()->make(BookingServices::class); 
            $userServices = app()->make(UserServices::class); 
            $pendingAppointmentsCounter = count($bookingServices->requestedAppointment(Auth::id())->get());

            $doctorDetails   = $userServices->getDoctorDataById(Auth::id());
            view()->share(['appointmentCounter'=>$pendingAppointmentsCounter, 'doctorDetails'=> $doctorDetails]);
        });
        
    }
}