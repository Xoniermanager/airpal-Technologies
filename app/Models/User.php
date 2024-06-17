<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Service;
use App\Models\Language;
use App\Models\UserAddress;
use App\Models\Specialization;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use App\Models\DoctorWorkingHours;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'display_name',
        'image_url',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function specializations()
    // {
    //     return $this->belongsToMany(Specialization::class,'doctor_specialities');
    // }
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'doctor_specialities', 'user_id', 'speciality_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'doctor_services');
    }

    public function educations()
    {
        return $this->hasMany(DoctorEducation::class)->with("course");
    }
    public function experiences()
    {
        return $this->hasMany(DoctorExperience::class);
    }
    public function workingHour()
    {
        return $this->hasMany(DoctorWorkingHours::class);
    }
    public function language()
    {
        return $this->belongsToMany(Language::class,'doctor_languages');
    }
    public function awards()
    {
        return $this->hasMany(DoctorAward::class,'user_id');
    }

    public function doctorAddress()
    {
        return $this->hasOne(UserAddress::class,'user_id');
    }
    
   
}
