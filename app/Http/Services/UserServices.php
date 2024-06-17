<?php

namespace App\Http\Services;

use App\Models\Country;
use Illuminate\Http\UploadedFile;
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
    return  $this->UserRepository->with('doctorAddress.states.country')->get();
  }
  public function addDoctorPersonalDetails($data)
  {
    // dd($data["name"]);
    // dd($data);
    $filename = null;
    if (isset($data["image"])) {
      $image = $data["image"];
      if ($image instanceof \Illuminate\Http\UploadedFile) {
        $filename = 'doctor_image_' . time() . '.' . $image->getClientOriginalName();
        $destinationPath = public_path('images');
        $image->move($destinationPath, $filename);
      }
    }
    // if($data->hasFile($data['image'])){
    //   $file = $data->file($data['image']);
    //   $filename = time() . '.' . $file->getClientOriginalExtension();
    //   $destinationPath = public_path('doctor_image'); 
    //   $file->move($destinationPath, $filename);
    //   $data['image_url'] = $filename;
    // }


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
    // if (isset($data["image"])) {
    //   $image = $data["image"];
    //   if ($image instanceof \Illuminate\Http\UploadedFile) {
    //     $filename = 'doctor_image_' . time() . '.' . $image->getClientOriginalName();
    //     $destinationPath = public_path('images');
    //     $image->move($destinationPath, $filename);
    //   }
    // }

    $doctor = [
      "first_name"   => $data["first_name"],
      "last_name"    => $data["last_name"],
      "display_name" => $data["display_name"],
      "email"        => $data["email"],
      "phone"        => $data["phone"],
      "description"  => $data["description"],
    ];

    if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
      
      $file = $data['image'];
      $filename = time() . '.' . $file->getClientOriginalExtension();
      $destinationPath = public_path('images');
      $file->move($destinationPath, $filename);
      $doctor['image_url'] = $filename;
  }

    if (isset($data['password'])) {
      $doctor['password'] = Hash::make($data["password"]);
    }
    $user = $this->UserRepository->updateOrCreate(
      ['email' => $email],
      $doctor
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


}
