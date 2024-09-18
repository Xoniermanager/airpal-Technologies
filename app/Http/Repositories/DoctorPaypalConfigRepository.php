<?php

namespace App\Http\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\DoctorReview;
use App\Models\PaypalConfig;

class DoctorPaypalConfigRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaypalConfig::class;
    }
}
