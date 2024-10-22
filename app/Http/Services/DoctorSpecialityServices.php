<?php
namespace App\Http\Services;
use App\Models\User;
use App\Models\Country;
use App\Models\DoctorSpeciality;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\DoctorSpecialityRepository;

class DoctorSpecialityServices {
    private  $doctor_speciality_repository;
    public function __construct(DoctorSpecialityRepository $doctor_speciality_repository) {
        $this->doctor_speciality_repository = $doctor_speciality_repository;
     }
    public function addOrUpdateDoctorSpecialities($userId, $specialities) {

      $userDetails = User::find($userId);
      $userDetails->specializations()->sync($specialities);
      return true;
  }

public function getSpecialtyGroupByDoctor()
{
  return $this->doctor_speciality_repository
  ->select(
      'specializations.name AS speciality_name',
      'specializations.description as description',
      'specializations.id as id',
      'specializations.image_url as image_url',
      DB::raw('COUNT(doctor_specialities.user_id) AS doctor_count')
  )
  ->join('specializations', 'doctor_specialities.speciality_id', '=', 'specializations.id')
  ->groupBy('specializations.name', 'specializations.description','id','specializations.image_url')
  ->get();
}


public function doctorListBySpecialtyID($id)
  {
    // return $this->doctor_speciality_repository->where('speciality_id', $id)->with('user')->get();
    return $this->doctor_speciality_repository
    ->where('speciality_id', $id)
    ->whereHas('user', function ($query) {
        $query->where('profile_status', '>=', site('profile_status'));
    })->with('user')->get();
  }
}


