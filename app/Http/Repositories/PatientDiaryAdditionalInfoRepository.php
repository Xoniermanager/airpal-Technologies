<?php

namespace App\Http\Repositories;

use App\Models\PatientDiaryAdditionalInfo;
use Prettus\Repository\Eloquent\BaseRepository;

class PatientDiaryAdditionalInfoRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PatientDiaryAdditionalInfo::class;
    }
}
