<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use App\Helpers\CalculateExperience;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\UserRepository;


class UserServices
{
  private  $UserRepository;
  private $doctorAddressServices;

  public function __construct(UserRepository $UserRepository, DoctorAddressServices $doctorAddressServices)
  {
    $this->UserRepository = $UserRepository;
    $this->doctorAddressServices = $doctorAddressServices;
  }
  public function all()
  {
    return  $this->UserRepository->with(['doctorAddress.states.country', 'specializations', 'educations', 'doctorExceptionDays', 'favoriteDoctor'])->get();
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

    $user = $this->UserRepository->create([
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
    return $this->UserRepository->where('role', 2)->with(["educations", "experiences", "workingHour", "specializations", "services", "language"])->orderBy('id', 'desc')->paginate(10);
  }

  public function getDoctorDataForFrontend()
  {
    return $this->UserRepository->where('role', 2)->with(["experiences", "specializations", "services"])->paginate(5);
  }
  public function getDoctorDataById($id)
  {
    return $this->UserRepository->where('id', $id)->with(["educations.course", "experiences.hospital", "workingHour", "specializations", "services", "workingHour.daysOfWeek", "language", 'awards.award', 'doctorAddress.country', 'doctorAddress.states'])->first();
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
    if (isset($data['image']) && $data['image'] instanceof UploadedFile) {

      $file     = $data['image'];
      $filename = time() . '.' . $file->getClientOriginalExtension();
      $destinationPath = public_path('images');
      $file->move($destinationPath, $filename);
      $payload['image_url'] = $filename;
    }

    if (isset($data['password'])) {
      $payload['password'] = Hash::make($data["password"]);
    }

    $user = $this->UserRepository->updateOrCreate(
      ['email' => $data["email"]],
      $payload
    );

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

    $query = $this->UserRepository->newQuery();


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

    return $query->paginate(10);
  }

  public function getDoctorQuestionById($id)
  {
    return $this->UserRepository->where('id', $id)->with(["doctorQuestions.options"])->first();
  }

  public function getPatientById($id)
  {
    return $this->UserRepository->where('id', $id)->first();
  }

  public function getPatientByDoctorId($id)
  {
    return $this->UserRepository->where('role',3)->get();
  }

  public function updatePatient($data)
  {
    $filename = null;
    $payload   = [
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

    if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
      $file     = $data['image'];
      $filename = time() . '.' . $file->getClientOriginalExtension();
      $destinationPath = public_path('images');
      $file->move($destinationPath, $filename);
      $payload['image_url'] = $filename;
    }
    $user = $this->UserRepository->updateOrCreate(
      ['email' => $data["email"]],
      $payload
    );
    $message = $user->wasRecentlyCreated ? 'Patient created successfully.' : 'Patient updated successfully.';
    $status  = $user->wasRecentlyCreated ? 'created' : 'updated';

    return response()->json(
      [
        'message' => $message,
        'status'  => $status,
        'id'      => $user->id
      ]
    );
  }
}
