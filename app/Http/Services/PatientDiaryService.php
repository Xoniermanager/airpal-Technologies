<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Arr;
use App\Http\Repositories\PatientDiaryRepository;

class PatientDiaryService
{
   public  $patientDiaryRepository;
   public  $patientDiaryAdditionalInfoService;

   public $medicationHealthProgressService;
   public function __construct(PatientDiaryRepository $patientDiaryRepository, PatientDiaryAdditionalInfoService $patientDiaryAdditionalInfoService, MedicationHealthProgressService $medicationHealthProgressService)
   {
      $this->patientDiaryRepository = $patientDiaryRepository;
      $this->patientDiaryAdditionalInfoService = $patientDiaryAdditionalInfoService;
      $this->medicationHealthProgressService = $medicationHealthProgressService;
   }

   public function createDetails($data)
   {
      try {
         $patientDiaryPayload = Arr::except($data, ['_token', 'reason_morning_breakfast', 'reason_afternoon_lunch', 'reason_night_dinner', 'reason_morning_medicine', 'reason_afternoon_medicine', 'reason_night_medicine', 'health_progress', 'side_effect', 'improvement']);
         $patientDiaryDetails = $this->patientDiaryRepository->create($patientDiaryPayload);
         if ($patientDiaryDetails) {
            $medicationHealtPayload = Arr::only($data, ['health_progress', 'side_effect', 'improvement']);
            $medicationHealtPayload['patient_diary_id'] = $patientDiaryDetails->id;
            $medicationHealtDetails = $this->medicationHealthProgressService->createMedicationHealthProgress($medicationHealtPayload);
            if ($data['morning_breakfast'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($patientDiaryDetails->id, 'morning_breakfast', $data['reason_morning_breakfast']);
            }
            if ($data['afternoon_lunch'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($patientDiaryDetails->id, 'afternoon_lunch', $data['reason_afternoon_lunch']);
            }
            if ($data['night_dinner'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($patientDiaryDetails->id, 'night_dinner', $data['reason_night_dinner']);
            }
            if ($data['morning_medicine'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($patientDiaryDetails->id, 'morning_medicine', $data['reason_morning_medicine']);
            }
            if ($data['afternoon_medicine'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($patientDiaryDetails->id, 'afternoon_medicine', $data['reason_afternoon_medicine']);
            }
            if ($data['night_medicine'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($patientDiaryDetails->id, 'night_medicine', $data['reason_night_medicine']);
            }
         }
         $response = ['status' => true, 'data' => $patientDiaryDetails];
         return $response;
      } catch (Exception $e) {
         $response = ['status' => false, 'data' => $e->getmessage()];
         return $response;
      }
   }

   public function updateDetails($data)
   {
      try {
         $patientDiaryPayload = Arr::except($data, ['_token', 'reason_morning_breakfast', 'reason_afternoon_lunch', 'reason_night_dinner', 'reason_morning_medicine', 'reason_afternoon_medicine', 'reason_night_medicine', 'health_progress', 'side_effect', 'improvement']);
         $updatePatientDiaryDetails = $this->patientDiaryRepository->find($data['id'])->update($patientDiaryPayload);
         $medicationHealtPayload = Arr::only($data, ['health_progress', 'side_effect', 'improvement']);
         if ($updatePatientDiaryDetails) {
            $medicationHealtDetails = $this->medicationHealthProgressService->updateMedicationHealthProgress($medicationHealtPayload, $data['id']);
            if ($data['morning_breakfast'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($data['id'], 'morning_breakfast', $data['reason_morning_breakfast']);
            }
            if ($data['afternoon_lunch'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($data['id'], 'afternoon_lunch', $data['reason_afternoon_lunch']);
            }
            if ($data['night_dinner'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($data['id'], 'night_dinner', $data['reason_night_dinner']);
            }
            if ($data['morning_medicine'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($data['id'], 'morning_medicine', $data['reason_morning_medicine']);
            }
            if ($data['afternoon_medicine'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($data['id'], 'afternoon_medicine', $data['reason_afternoon_medicine']);
            }
            if ($data['night_medicine'] == 0) {
               $this->patientDiaryAdditionalInfoService->createAdditionalInfo($data['id'], 'night_medicine', $data['reason_night_medicine']);
            }
            if ($data['morning_breakfast'] == 1) {
               $this->patientDiaryAdditionalInfoService->deleteDetails($data['id'], 'morning_breakfast');
            }
            if ($data['afternoon_lunch'] == 1) {
               $this->patientDiaryAdditionalInfoService->deleteDetails($data['id'], 'afternoon_lunch');
            }
            if ($data['night_dinner'] == 1) {
               $this->patientDiaryAdditionalInfoService->deleteDetails($data['id'], 'night_dinner');
            }
            if ($data['morning_medicine'] == 1) {
               $this->patientDiaryAdditionalInfoService->deleteDetails($data['id'], 'morning_medicine');
            }
            if ($data['afternoon_medicine'] == 1) {
               $this->patientDiaryAdditionalInfoService->deleteDetails($data['id'], 'afternoon_medicine');
            }
            if ($data['night_medicine'] == 1) {
               $this->patientDiaryAdditionalInfoService->deleteDetails($data['id'], 'night_medicine');
            }
         }
         $response = ['status' => true, 'data' => $updatePatientDiaryDetails];
         return $response;
      } catch (Exception $e) {
         $response = ['status' => false, 'data' => $e->getmessage()];
         return $response;
      }
   }

   public function getAllDiaryDetailsByPatientId($patientId)
   {
      return $this->patientDiaryRepository->where('patient_id', $patientId)->with(['patientAdditionalInfo', 'medicationHealthProgress'])->paginate(10);
   }

   public function getDiaryById($id)
   {
      return $this->patientDiaryRepository->with(['patientAdditionalInfo', 'medicationHealthProgress'])->find($id);
   }
   public function getDiaryDetailsByDate($date,$patientId)
   {
      return $this->patientDiaryRepository->with(['patientAdditionalInfo', 'medicationHealthProgress'])->where('patient_id',$patientId)->whereDate('created_at', $date)->first();
   }
}
