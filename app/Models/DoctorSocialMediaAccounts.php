<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSocialMediaAccounts extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id','account_type','link','status'];
}
