<?php

namespace App\Models;

use App\Models\DayOfWeek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExceptionDays extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id','exception_days_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function exceptionDay()
    {
        return $this->belongsTo(DayOfWeek::class,'exception_days_id');
   
    }


}

