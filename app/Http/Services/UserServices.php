<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use App\Helpers\CalculateExperience;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\UserRepository;


class UserServices
{
  private  $UserRepository;
  public function __construct(UserRepository $UserRepository)
  {
    $this->UserRepository = $UserRepository;
  }
  public function all()
  {
    return  $this->UserRepository->with(['doctorAddress.states.country','specializations','educations','doctorExceptionDays'])->get();
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
    return $this->UserRepository->with(["educations", "experiences", "workingHour", "specializations", "services", "language"])->orderBy('id', 'desc')->paginate(10);
  }

  public function getDoctorDataForFrontend()
  {
    return $this->UserRepository->with(["educations", "experiences", "workingHour", "specializations", "services"])->paginate(5);
  }
  public function getDoctorDataById($id)
  {
    return $this->UserRepository->where('id', $id)->with(["educations", "experiences", "workingHour", "specializations", "services", "workingHour.daysOfWeek", "language", 'awards'])->first();
  }

  public function updateOrCreateDoctor($email, $data)
  {

    $filename = null;
    $payload   = [
                  "first_name"   => $data["first_name"],
                  "last_name"    => $data["last_name"],
                  "display_name" => $data["display_name"],
                  "gender"       => $data["gender"],
                  "email"        => $data["email"],
                  "phone"        => $data["phone"],
                  "description"  => $data["description"],
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
      ['email' => $email],
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
    

       return $query->paginate(6);
  }

}
