<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DoctorSocialMediaAccounts extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id','account_type','link','status'];

    public function socialMediaAccountType()
    {
        return $this->belongsTo(SocialMediaType::class ,'account_type');
    }
}
