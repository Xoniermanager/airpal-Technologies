<?php

namespace App\Http\Repositories;

use App\Models\DoctorSocialMediaAccounts;
use Prettus\Repository\Eloquent\BaseRepository;

class SocialMediaRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DoctorSocialMediaAccounts::class;
    }
}
