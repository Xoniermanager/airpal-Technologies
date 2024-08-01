<?php

namespace App\Http\Services;

use App\Http\Repositories\DoctorReviewRepository;
use App\Models\DoctorReview;
use Illuminate\Support\Facades\DB;

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

   public function getAllRatingGroupByRatingNumber()
   {
   
   // return $this->doctorReviewRepository->get()->groupBy('rating');
   return  $this->doctorReviewRepository
    ->select('rating', DB::raw('count(*) as total'))
    ->groupBy('rating')
    ->pluck('total','rating');
   }

   public function checkReviewDoctorAndPatientid($patientId,$doctorId)
   {
      return $this->doctorReviewRepository->where('patient_id',$patientId)->where('doctor_id',$doctorId)->count();
   }
}
