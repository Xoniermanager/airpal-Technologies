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
      return $this->doctorReviewRepository->create($data);
   }

   public function all()
   {
      return $this->doctorReviewRepository->with(['doctor:id,display_name,image_url,email','patient:id,first_name,last_name,email,image_url'])->get()->groupBy('doctor_id');
   }
}
