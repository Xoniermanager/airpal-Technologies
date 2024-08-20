<?php 

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Repositories\UserRepository;

/*
This function is used for calculating user experience 
*/
class CalculateExperience
{

    public static function doctorExperience($userId)
    {
        $user = User::find($userId);     
        $totalDays = 0;
        foreach ($user->experiences as $experience) {
            $startDate =  Carbon::parse($experience->start_date);
            $endDate   =  Carbon::parse($experience->end_date);
            $days      =  $startDate->diffInDays($endDate);
            $totalDays += $days;
        }
        $totalYears  = $totalDays / 365;
        return User::where(['id' => $user->id])->update(['experience_years'=> $totalYears]);
}
}


