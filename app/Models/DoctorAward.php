<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAward extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' ,'award_id','year','description','certificates']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class, 'award_id',"id");
    }

    

}
