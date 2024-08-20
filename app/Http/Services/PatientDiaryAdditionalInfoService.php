<?php

namespace App\Http\Services;

use App\Http\Repositories\PatientDiaryAdditionalInfoRepository;

class PatientDiaryAdditionalInfoService
{
   public  $patientDiaryAdditionalInfoRepository;
   public function __construct(PatientDiaryAdditionalInfoRepository $patientDiaryAdditionalInfoRepository)
   {
      $this->patientDiaryAdditionalInfoRepository = $patientDiaryAdditionalInfoRepository;
   }

   public function createAdditionalInfo($patientDiaryId, $type, $additionalNote)
   {
      $payload = [
         'patient_diary_id' => $patientDiaryId,
         'type' => $type,
         'additional_note' => $additionalNote
      ];
      return $this->patientDiaryAdditionalInfoRepository->updateOrCreate([
         'patient_diary_id' => $patientDiaryId,
         'type' => $type,
      ], $payload);
   }
   public function deleteDetails($patientDiaryId, $type)
   {
      return $this->patientDiaryAdditionalInfoRepository->where('patient_diary_id', $patientDiaryId)->where('type', $type)->delete();
   }
}
