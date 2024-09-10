<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Client\Request;
use App\Helpers\CalculateExperience;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\UserRepository;


class UserServices
{
    private  $userRepository;
    private $doctorAddressServices;
    private $bookingService;

    public function __construct(UserRepository $userRepository, DoctorAddressServices $doctorAddressServices, BookingServices $bookingService)
    {
        $this->userRepository = $userRepository;
        $this->doctorAddressServices = $doctorAddressServices;
        $this->bookingService = $bookingService;
    }
    public function all()
    {
        return  $this->userRepository->with(['doctorAddress.states.country', 'specializations', 'educations', 'favoriteDoctor'])->get();
    }

    public function getAllDoctorsList()
    {
        return $this->userRepository->where('role', 2)->get();
    }

    public function addDoctorPersonalDetails($data)
    {
        $filename = null;
        if (isset($data["image"])) {
            $image = $data["image"];
            if ($image instanceof \Illuminate\Http\UploadedFile) {
                $filename = 'doctor_image_' . time() . '.' . $image->getClientOriginalName();
                $destinationPath = public_path('images');
                $image->move($destinationPath, $filename);
            }
        }

        $user = $this->userRepository->create([
            "first_name"   => $data["first_name"],
            "last_name"    => $data["last_name"],
            "display_name" => $data["display_name"],
            "email"        => $data["email"],
            "phone"        => $data["phone"],
            "password"     => Hash::make('Welcome!123'),
            "image_url"    => $filename
        ]);
        return $user->id;
    }

    public function getDoctorDataForAdmin()
    {
        return $this->userRepository->where('role', 2)->with(["educations", "experiences", "workingHour", "specializations", "services", "language"])->orderBy('id', 'desc')->paginate(10);
    }

    public function getDoctorDataForFrontend()
    {
        return $this->userRepository->where('role', 2)->with(["experiences", "specializations", "services", 'favoriteDoctor', 'doctorReview'])->paginate(6);
    }

    public function getDoctorDataById($id)
    {
        return $this->userRepository->where('id', $id)->with(["educations.course", "experiences.hospital", "workingHour", "specializations", "services", "workingHour.daysOfWeek", "language", 'awards.award', 'doctorAddress.country', 'doctorAddress.states', 'favoriteDoctor', 'doctorReview'])->first();
    }
    public function updateOrCreateDoctor($data)
    {
        $filename = null;
        $payload   = [
            "first_name"   => $data["first_name"],
            "last_name"    => $data["last_name"],
            "display_name" => $data["display_name"] ?? '',
            "gender"       => $data["gender"] ?? '',
            "email"        => $data["email"],
            "phone"        => $data["phone"],
            "role"         => 2,
            "description"  => $data["description"] ?? '',
        ];

        if (isset($data['image']) && !empty($data['image'])) {
            $payload['image_url'] = uploadingImageorFile($data['image'], 'profile-image', $data['first_name']);
        }

        if (isset($data['password'])) {
            $payload['password'] = Hash::make($data["password"]);
        }
        $user = $this->userRepository->where('email', $data["email"])->first();

        if ($user) {
            $user->update($payload);
        } else {
            $user = $this->userRepository->create($payload);
        }

        $message = $user->wasRecentlyCreated ? 'Doctor created successfully.' : 'Doctor updated successfully.';
        $status  = $user->wasRecentlyCreated ? 'created' : 'updated';

        return response()->json(
            [
                'message' => $message,
                'status'  => $status,
                'id'      => $user->id
            ]
        );
    }

    public function searchInDoctors($searchedKey)
    {
        $data['gender']     = array_key_exists('gender', $searchedKey) ? $searchedKey['gender'] : '';
        $data['languages']  = array_key_exists('languages', $searchedKey) ? $searchedKey['languages'] : '';
        $data['experience'] = array_key_exists('experience', $searchedKey) ? $searchedKey['experience'] : '';
        $data['specialty']  = array_key_exists('specialty', $searchedKey) ? $searchedKey['specialty'] : '';
        $data['services']  = array_key_exists('services', $searchedKey) ? $searchedKey['services'] : '';
        $data['rating']  = array_key_exists('rating', $searchedKey) ? $searchedKey['rating'] : '';
        $data['search']  = array_key_exists('searchKey', $searchedKey) ? $searchedKey['searchKey'] : '';


        $query = $this->userRepository->with(["specializations", "services", "educations.course", 'favoriteDoctor'])->newQuery();

        // Search for doctor roles only
        $query->where('role', 2);

        if (!empty($data['gender'])) {
            $query->whereIn('gender', $data['gender']);
        }

        if (!empty($data['languages'])) {
            $query->whereHas('language', function ($q) use ($data) {
                $q->whereIn('languages.id', $data['languages']);
            });
        }

        if (!empty($data['specialty'])) {
            $query->whereHas('specializations', function ($q) use ($data) {
                $q->whereIn('specializations.id', $data['specialty']);
            });
        }

        if (!empty($data['services'])) {
            $query->whereHas('services', function ($q) use ($data) {
                $q->whereIn('services.id', $data['services']);
            });
        }

        if (!empty($data['experience'])) {
            $expArray = [];
            foreach ($data['experience'] as $experience) {
                $value = explode('-', $experience);
                $expArray[] = [$value[0], isset($value[1]) ? $value[1] : ''];
            }

            $query->where(function ($query) use ($expArray) {
                foreach ($expArray as $range) {
                    $query->orWhereBetween('experience_years', $range);
                }
            });
        }
        if (!empty($data['rating'])) {
            foreach ($data['rating'] as $selectedRating) {
                $query->where('allover_rating', '>', $selectedRating - 1)
                    ->Where('allover_rating', '<=', $selectedRating);
            }
        }

        // Using provided search key to search in doctor name, speciality ans services
        if (!empty($data['search'])) {
            // Search in doctor first name and last name
            $searchKey = explode(' ', $data['search']);

            if (count($searchKey) > 1) {
                $query->where('first_name', 'like', "%{$searchKey[0]}%");
                $query->where('last_name', 'like', "%{$searchKey[1]}%");
                $query->orWhere('display_name', 'like', "%{$data['search']}%");
            } else {
                $query->where('first_name', 'like', "%{$data['search']}%");
                $query->orWhere('last_name', 'like', "%{$data['search']}%");
                $query->orWhere('display_name', 'like', "%{$data['search']}%");
            }

            // Search in speciality
            $query->orWhereHas('specializations', function ($q) use ($data) {
                $q->where('specializations.name', 'like', "%{$data['search']}%");
            });

            // Search in specializations
            $query->orWhereHas('services', function ($q) use ($data) {
                $q->where('services.name', 'like', "%{$data['search']}%");
            });

            // Search in eduction
            $query->orWhereHas('educations', function ($q) use ($data) {
                $q->where('institute_name', 'like', "%{$data['search']}%");
            });
        }
        // return $query->toRawSql();
        $doctorsCount = $query->count();
        return [
            'data'  =>  $query->paginate(6),
            'doctorsCount' =>  $doctorsCount
        ];
    }

    public function getDoctorQuestionById($id)
    {
        return $this->userRepository->where('id', $id)->with(["doctorQuestions.options"])->first();
    }

    public function getPatientById($id)
    {
        return $this->userRepository->where('id', $id)->with(['bookedAppointments', 'bookedAppointments.prescription', 'bookedAppointments.doctor'])->first();
    }

    public function getPatientByDoctorId($id)
    {
        return $this->userRepository->where('role', 3)->get();
    }

    public function updatePatient($data)
    {
        $filename = null;
        $payload = [
            "first_name"   => $data["first_name"],
            "last_name"    => $data["last_name"],
            "display_name" => $data["display_name"] ?? '',
            "gender"       => $data["gender"] ?? '',
            "dob"          => $data["dob"] ?? '',
            "blood_group"  => $data["blood_group"] ?? '',
            "email"        => $data["email"],
            "phone"        => $data["phone"],
            "role"         => 3,
            "description"  => $data["description"] ?? '',
        ];
        $user = $this->userRepository->find($data['user_id']);
        if ($user)
        {
            if (isset($data['image']) && !empty($data['image']))
            {
                if ($user->image_url != null)
                {
                    unlinkFileOrImage($user->getRawOriginal('image_url'));
                }
                $payload['image_url'] = uploadingImageorFile($data['image'], 'profile-image', $data['first_name']);
            }
            // User exists, perform update
            $user->update($payload);
            $message = 'Patient updated successfully.';
            $status = 'updated';
        }
        else {
            // User does not exist, perform create
            if (isset($data['image']) && !empty($data['image'])) {
                $payload['image_url'] = uploadingImageorFile($data['image'], 'profile-image', $data['first_name']);
            }
            $user = $this->userRepository->create($payload);
            $message = 'Patient created successfully.';
            $status = 'created';
        }

        return response()->json([
            'message' => $message,
            'status' => $status,
            'id' => $user->id
        ]);
    }

    public function searchDoctors($data)
    {
        $query = $this->userRepository->newQuery();

        // Static condition for role = 2 (assumed to be 'doctor')
        $query->where('role', 2);

        if (!empty($data['searchKey'])) {
            $query->where(function ($q) use ($data) {
                $q->where('first_name', 'like', '%' . $data['searchKey'] . '%')
                    ->orWhere('last_name', 'like', '%' . $data['searchKey'] . '%');
            });
        }
        return $query->get();
    }
}
