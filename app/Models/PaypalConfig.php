<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalConfig extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id','PAYPAL_MODE','PAYPAL_LIVE_CLIENT_ID','PAYPAL_LIVE_CLIENT_SECRET','PAYPAL_LIVE_APP_ID','PAYPAL_PAYMENT_ACTION'];
}
