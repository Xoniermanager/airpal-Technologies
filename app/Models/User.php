<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Service;
use App\Models\Language;
use App\Models\UserAddress;
use App\Models\Specialization;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use Laravel\Sanctum\HasApiTokens;
use App\Models\DoctorWorkingHours;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

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
        'gender',
        'dob',
        'blood_group',
        'role',
        'image_url',
        'description',
        'experience_years'
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

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name .' ' . $this->last_name
        );
    }

    protected function profilePicture(): Attribute
    {
        return new Attribute(
            get: fn () =>  asset('images/' . $this->image_url)
        );
    }
    // protected function imageUrl(): Attribute   
    // {
    //     return Attribute::make(
    //         get: fn($value) =>  $value ? asset('images/' .  $value) : ''
    //     );
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
        return $this->hasMany(DoctorEducation::class);
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
    
    public function doctorSlots()
    {
        return $this->hasMany(DoctorSlots::class,'user_id');
    }  

    public function doctorExceptionDays()
    {
        return $this->hasMany(ExceptionDays::class,'doctor_id');
    } 

    public function doctorQuestions()
    {
        return $this->hasMany(DoctorQuestions::class,'doctor_id');
    } 
    public function patientAddress()
    {
        return $this->hasOne(UserAddress::class,'user_id');
    }  
    
    public function isAdmin()
    {
        return $this->role === 1;
    }

    public function isDoctor()
    {
        return $this->role === 2;
    }

    public function isPatient()
    {
        return $this->role === 3;
    }

    public function bookedAppointments()
    {
        return $this->hasMany(BookingSlots::class,'patient_id');
    }

}
