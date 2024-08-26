<?php

namespace App\Http\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Prescription;

class PrescriptionRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Prescription::class;
    }
}
