<?php

namespace App\Http\Repositories;

use App\Models\Partner;
use Prettus\Repository\Eloquent\BaseRepository;


class PartnersRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Partner::class;
    }
}
