<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class UpdateDoctorRatingsAverageValue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $doctorId;
    /**
     * Create a new job instance.
     */
    public function __construct($doctorId = null)
    {
        $this->doctorId = $doctorId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if( $this->doctorId != null)
        {
            $doctorsWithReviews = User::with('doctorReview')->where('role', 2)->where('id', $this->doctorId)->get();
        }
        else
        {
            $doctorsWithReviews = User::with('doctorReview')->where('role', 2)->get();
        }
       
        foreach ($doctorsWithReviews as $doctorsWithReview) {
            $reviewsSum = collect($doctorsWithReview->doctorReview)->sum('rating');
            $reviewscount = collect($doctorsWithReview->doctorReview)->count();
            $averageratings = round((float)$reviewsSum / (float)$reviewscount, 2);
            $doctorsWithReview->update(['allover_rating' => $averageratings]);
        }
    }
}
