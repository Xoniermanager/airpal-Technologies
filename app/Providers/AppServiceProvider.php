<?php

namespace App\Providers;

use App\Models\DoctorExperience;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Observers\ExperienceYearsObserver;

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
        //
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        DoctorExperience::observe(ExperienceYearsObserver::class);
    }
}
