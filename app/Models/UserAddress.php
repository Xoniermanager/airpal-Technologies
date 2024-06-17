<?php

namespace App\Models;

use App\Models\User;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAddress extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'country_id',
        'address_type',
        'state_id',
        'address',
        'city',
        'pin_code',
    ];

    public function user()
    {
     return $this->belongsTo(User::class); 
    }

    public function states()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'state_id');
    }
}
