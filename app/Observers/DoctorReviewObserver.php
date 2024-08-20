<?php

namespace App\Observers;

use App\Models\DoctorReview;
use App\Jobs\UpdateDoctorRatingsAverageValue;

class DoctorReviewObserver
{
    /**
     * Handle the DoctorReview "created" event.
     */
    public function created(DoctorReview $doctorReview): void
    {
        UpdateDoctorRatingsAverageValue::dispatch($doctorReview->doctor_id);
    }

    /**
     * Handle the DoctorReview "updated" event.
     */
    public function updated(DoctorReview $doctorReview): void
    {
        UpdateDoctorRatingsAverageValue::dispatch($doctorReview->doctor_id);
    }

    /**
     * Handle the DoctorReview "deleted" event.
     */
    public function deleted(DoctorReview $doctorReview): void
    {
        UpdateDoctorRatingsAverageValue::dispatch($doctorReview->doctor_id);
    }

    /**
     * Handle the DoctorReview "restored" event.
     */
    public function restored(DoctorReview $doctorReview): void
    {
        //
    }

    /**
     * Handle the DoctorReview "force deleted" event.
     */
    public function forceDeleted(DoctorReview $doctorReview): void
    {
        //
    }
}
