<?php

namespace App\Http\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\MedicalRecord;

class MedicalRecordRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MedicalRecord::class;
    }
}
