<?php

namespace App\Http\Repositories;

use App\Models\OurTeam;
use Prettus\Repository\Eloquent\BaseRepository;


class OurTeamRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OurTeam::class;
    }
}
