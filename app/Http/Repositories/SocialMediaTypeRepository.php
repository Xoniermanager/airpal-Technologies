<?php

namespace App\Http\Repositories;

use App\Models\SocialMediaType;
use App\Models\DoctorSocialMediaAccounts;
use Prettus\Repository\Eloquent\BaseRepository;

class SocialMediaTypeRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SocialMediaType::class;
    }
}
