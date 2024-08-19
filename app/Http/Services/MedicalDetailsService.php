<?php

namespace App\Http\Services;

use App\Http\Repositories\MedicalRecordRepository;
use Exception;

class MedicalDetailsService
{
    private  $medicalRecordRepository;
    public function __construct(MedicalRecordRepository $medicalRecordRepository)
    {
        $this->medicalRecordRepository = $medicalRecordRepository;
    }
    public function createDetails($data)
    {
        try {
            if (isset($data['file']) && !empty($data['file'])) {
                $data['file'] = uploadingImageorFile($data['file'], 'medical_record', $data['name']);
            }
            $createdMedicalRecord =  $this->medicalRecordRepository->create($data);
            $response = ['status' => true, 'data' => $createdMedicalRecord];
            return $response;
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => $e->getmessage()];
            return $response;
        }
    }

    public function getMedicalRecordByPatientId($patientId)
    {
        return $this->medicalRecordRepository->where('patient_id', $patientId)->orderBy('id', 'DESC')->paginate(10);
    }

    public function getMedicalRecordById($id)
    {
        return $this->medicalRecordRepository->find($id);
    }

    public function UpdateDetails($data, $id)
    {
        try {
            $medicalRecordDetails = $this->medicalRecordRepository->find($id);
            if (isset($data['file']) && !empty($data['file'])) {
                if ($medicalRecordDetails->file != null) {
                    unlinkFileOrImage($medicalRecordDetails->getRawOriginal('file'));
                }
                $data['file'] = uploadingImageorFile($data['file'], 'medical_record', $data['name']);
            }
            $updatedMedicalRecord =  $medicalRecordDetails->update($data);
            $response = ['status' => true, 'data' => $updatedMedicalRecord];
            return $response;
        } catch (Exception $e) {
            $response = ['status' => false, 'data' => $e->getmessage()];
            return $response;
        }
    }
    public function deleteDetails($id)
    {
        try {
            $medicalRecordDetails = $this->medicalRecordRepository->find($id);
            if ($medicalRecordDetails->file != null) {
                unlinkFileOrImage($medicalRecordDetails->getRawOriginal('file'));
            }
            return ['status' => true, 'data' => $medicalRecordDetails->delete()];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getmessage()];
        }
    }

    public function searchFilterMedicalRecord($searchKey, $patientId)
    {
        $medicalRecord = $this->medicalRecordRepository->where('patient_id', $patientId)->newQuery();
        $medicalRecord = $medicalRecord->where('name', 'like', "%{$searchKey}%")->orWhere('description', 'like', "%{$searchKey}%");
        $medicalRecord->get();
    }
}
