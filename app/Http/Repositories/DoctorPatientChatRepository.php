<?php

namespace App\Http\Repositories;

use App\Models\DoctorPatientChat;
use Prettus\Repository\Eloquent\BaseRepository;

class DoctorPatientChatRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DoctorPatientChat::class;
    }
}
