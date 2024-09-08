<?php

namespace App\Http\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Payment;

class PaymentRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Payment::class;
    }
}