<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DoctorSocialMediaAccounts extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id','social_media_type_id','link','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function socialMediaAccountType()
    {
        return $this->belongsTo(SocialMediaType::class ,'account_type');
    }


}
