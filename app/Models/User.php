<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\Language;
use App\Models\UserAddress;
use App\Models\Specialization;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use Laravel\Sanctum\HasApiTokens;
use App\Models\DoctorWorkingHours;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'experience_years',
        'allover_rating'
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
    protected $appends = ['age'];

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
            get: fn() => $this->first_name . ' ' . $this->last_name
        );
    }


    public function getAgeAttribute(): Attribute
    {
        return new Attribute(
            get: fn() => Carbon::parse($this->attributes['dob'])->age
        );
    }
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url("storage/" .  $value)
        );
    }

    public function getFullAddressAttribute()
    {
        $address = $this->patientAddress; // Eager load the address relationship if necessary
        if ($address) {
            return $address->address . ', ' . $address->city . ', ' . $address->state . ' ' . $address->postal_code;
        }

        return 'No address available';
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'doctor_specialities', 'user_id', 'speciality_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_services');
    }
    public function favoriteDoctor()
    {
        return $this->hasMany(FavoriteDoctor::class, 'doctor_id');
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
        return $this->belongsToMany(Language::class, 'doctor_languages');
    }
    public function awards()
    {
        return $this->hasMany(DoctorAward::class, 'user_id');
    }
    public function doctorAddress()
    {
        return $this->hasOne(UserAddress::class, 'user_id');
    }

    public function doctorSlots()
    {
        return $this->hasMany(DoctorSlots::class, 'user_id');
    }

    public function doctorExceptionDays()
    {
        return $this->hasMany(ExceptionDays::class, 'doctor_id');
    }

    public function doctorQuestions()
    {
        return $this->hasMany(DoctorQuestions::class, 'doctor_id');
    }
    public function patientAddress()
    {
        return $this->hasOne(UserAddress::class, 'user_id');
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
        return $this->hasMany(BookingSlots::class, 'patient_id');
    }
    public function doctorReview()
    {
        return $this->hasMany(DoctorReview::class, 'doctor_id');
    }

    /*
    Get Sent Chat details
    */
    public function sentChatDetails()
    {
        return $this->hasOne(DoctorPatientChat::class, 'sender_id', 'id');
    }

    /*
    Get Received Chat details
    */
    public function receivedChatDetails()
    {
        return $this->hasOne(DoctorPatientChat::class, 'receiver_id', 'id');
    }


    public function bookNowButton()
    {
        $bookNowButton = '';
        $bookNowButton .= '<div class="mb-2">';
        $bookNowButton .= '<a href="' . route('appointment.index', ['id' => Crypt::encrypt($this->id)]) . '" class="btn book-btn">Book Now</a>';
        $bookNowButton .= '</div>';

        return $bookNowButton;
    }

    public function profileButton()
    {
        $profileButton = '';
        $profileButton .= '<div class="mb-2">';
        $profileButton .= '<a href="' . route('frontend.doctor.profile', ['user' => Crypt::encrypt($this->id)]) . '" class="btn view-btn">View Details</a>';

        $profileButton .= '</div>';

        return $profileButton;
    }

    public function doctorEducation()
    {
        if ($this->educations)
            foreach ($this->educations as $education) {
                return $education->course->name;
            }
        else {
            return '<p> Not found </p>';
        }
    }


    public function socialMediaAccounts()
    {
        return $this->hasMany(DoctorSocialMediaAccounts::class,'doctor_id');
    }

     // Method to generate the HTML list of social media accounts
     public function DoctorSocialMediaAccountsList()
     {


         $html = '<ul class="social-media-list d-flex mt-2 mb-1">';
         foreach ($this->socialMediaAccounts as $account) {
             $platform = $account->socialMediaAccountType->name;
             $url = $account->link;
             
             $iconClass = ($platform) ? "fab fa-".strtolower($platform)."-square" : "fab fa-globe";
             $html .= '<li class="mr-1"><a href="' . $url . '" target="_blank"><i class="' . $iconClass . '"></i></a></li>';
         }
 
         $html .= '</ul>';
 
         return $html;
     }
}
