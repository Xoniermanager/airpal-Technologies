<?php

namespace App\Http\Repositories;

use App\Models\MedicationHealthProgress;
use Prettus\Repository\Eloquent\BaseRepository;

class MedicationHealthProgressRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MedicationHealthProgress::class;
    }
}
