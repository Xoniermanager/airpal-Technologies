<?php

namespace App\Http\Repositories;

use App\Models\PatientDiary;
use Prettus\Repository\Eloquent\BaseRepository;

class PatientDiaryRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PatientDiary::class;
    }
}
