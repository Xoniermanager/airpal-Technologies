<?php

namespace App\Http\Services;

use App\Http\Repositories\MedicationHealthProgressRepository;

class MedicationHealthProgressService
{
   public  $medicationHealthProgressRepository;
   public function __construct(MedicationHealthProgressRepository $medicationHealthProgressRepository)
   {
      $this->medicationHealthProgressRepository = $medicationHealthProgressRepository;
   }

   public function createMedicationHealthProgress($data)
   {
      return $this->medicationHealthProgressRepository->create($data);
   }
   public function updateMedicationHealthProgress($data, $patientDiaryId)
   {
      return $this->medicationHealthProgressRepository->where('patient_diary_id', $patientDiaryId)->update($data);
   }
}
