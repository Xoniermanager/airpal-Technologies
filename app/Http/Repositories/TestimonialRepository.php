<?php

namespace App\Http\Repositories;

use App\Models\Testimonial;
use Prettus\Repository\Eloquent\BaseRepository;


class TestimonialRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Testimonial::class;
    }
}
