<?php

namespace App\Http\Services;

use App\Http\Repositories\DoctorReviewRepository;

class DoctorReviewService
{
   private  $doctorReviewRepository;
   public function __construct(DoctorReviewRepository $doctorReviewRepository)
   {
      $this->doctorReviewRepository = $doctorReviewRepository;
   }
   public function create($data)
   {
      if (isset($data['id']) && !empty($data['id'])) {
         return $this->doctorReviewRepository->find($data['id'])->update($data);
      } else {
         return $this->doctorReviewRepository->create($data);
      }
   }

   public function all($searchKey = null)
   {
      $allReviewDetails =  $this->doctorReviewRepository->with(['doctor:id,display_name,image_url,email', 'patient:id,first_name,last_name,email,image_url']);
      if (isset($searchKey['rating'])) {
         $allReviewDetails->orderBy('rating', $searchKey['rating']);
      }
      return $allReviewDetails->get();
   }

   public function getAllReviewByPatientId($patientId)
   {
      return $this->doctorReviewRepository->with(['doctor:id,display_name,image_url,email'])->where('patient_id', $patientId)->paginate(10);
   }
   public function getAllReviewByDoctorId($doctorId)
   {
      return $this->doctorReviewRepository->with('patient')->where('doctor_id', $doctorId)->paginate(10);
   }

   public function getReviewById($id)
   {
      return $this->doctorReviewRepository->find($id);
   }
}
