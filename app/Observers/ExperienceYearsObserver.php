<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\DoctorExperience;
use Illuminate\Support\Facades\Log;
use App\Helpers\CalculateExperience;
use App\Http\Repositories\UserRepository;


class ExperienceYearsObserver
{
    /**
     * Handle the DoctorExperience "created" event.
     */
    private  $userRepository;
    public function __construct(UserRepository $userRepository)
    {
      $this->userRepository = $userRepository;

    }
    public function created(DoctorExperience $doctorExperience)
    {
        CalculateExperience::doctorExperience($doctorExperience->user_id);
    }

    /**
     * Handle the DoctorExperience "updated" event.
     */
    public function updated(DoctorExperience $doctorExperience): void
    {
        CalculateExperience::doctorExperience($doctorExperience->user_id);
    }

    /**
     * Handle the DoctorExperience "deleted" event.
     */
    public function deleted(DoctorExperience $doctorExperience): void
    {
        CalculateExperience::doctorExperience($doctorExperience->user_id);
    }

    /**
     * Handle the DoctorExperience "restored" event.
     */
    public function restored(DoctorExperience $doctorExperience): void
    {
        //
    }

    /**
     * Handle the DoctorExperience "force deleted" event.
     */
    public function forceDeleted(DoctorExperience $doctorExperience): void
    {
        //
    }
}
