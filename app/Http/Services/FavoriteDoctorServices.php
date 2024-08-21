<?php

namespace App\Http\Services;

use App\Http\Repositories\FavoriteDoctorRepository;


class FavoriteDoctorServices
{
    private  $favoriteDoctorRepository;

    public function __construct(FavoriteDoctorRepository $favoriteDoctorRepository)
    {
        $this->favoriteDoctorRepository = $favoriteDoctorRepository;
    }
    public function getAllFavoriteDoctors($patientId)
    {
        return $this->favoriteDoctorRepository->where('patient_id', $patientId)->with('doctor');
    }
    public function getSingleFavoriteDoctors($data)
    {
        return $this->favoriteDoctorRepository
        ->where('doctor_id',$data['doctor_id'])
        ->where('patient_id',$data['patient_id'])
        ->first();
    }
    public function addFavoriteDoctor(array $data)
    {
        if ($data['liked'] === 'true') {
            return $this->favoriteDoctorRepository->updateOrCreate(
                [
                    'patient_id' => $data['patient_id'],
                    'doctor_id' => $data['doctor_id']
                ],
                $data
            );
        } else {
           return $this->removeFavoriteDoctor($data);
        }
    }
    
    public function removeFavoriteDoctor($data)
    {
        return $this->favoriteDoctorRepository
            ->where('doctor_id',$data['doctor_id'])
            ->where('patient_id',$data['patient_id'])
            ->delete();
    }
}
