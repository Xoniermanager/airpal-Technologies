<?php

namespace App\Http\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\DoctorAppointmentConfig;

class DoctorAppointmentConfigRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DoctorAppointmentConfig::class;
    }
}
