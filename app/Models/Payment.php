<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'paypal_payment_id',
        'amount',
        'currency',
        'payer_name',
        'payer_email',
        'payment_status',
        'payment_method',
        'purpose',
        'payment_details'
    ];
}
