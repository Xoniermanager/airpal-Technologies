<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorAward extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' ,'award_id','year','description','certificates']; 


    protected function certificates(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url("storage/" .  $value)
        );
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class, 'award_id',"id");
    }

    

}
