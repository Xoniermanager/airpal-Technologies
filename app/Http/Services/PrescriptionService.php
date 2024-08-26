<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Arr;
use App\Http\Repositories\PrescriptionRepository;
use App\Models\PrescriptionMedicineDetail;

class PrescriptionService
{
    private  $prescriptionRepository;
    public function __construct(PrescriptionRepository $prescriptionRepository)
    {
        $this->prescriptionRepository = $prescriptionRepository;
    }

    public function all()
    {
        return $this->prescriptionRepository->all();
    }

    public function create($data)
    {
        try {
            $prescriptionPayload = Arr::except($data, ['_token', 'medicine_detail']);
            $prescriptionDetails = $this->prescriptionRepository->create($prescriptionPayload);
            foreach ($data['medicine_detail'] as $medicineDetails) {
                $freq = implode(',', $medicineDetails['frequency']);
                $medicineDetails['frequency'] = $freq;
                $medicineDetails['prescription_id'] = $prescriptionDetails->id;
                PrescriptionMedicineDetail::create($medicineDetails);
            }
            return ['status' => true, 'data' => $prescriptionDetails];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getmessage()];
        }
    }

    public function getAllPrescriptionByDoctorId($doctorId)
    {
        return $this->prescriptionRepository->with(['prescriptionMedicineDetail', 'bookingSlot'])
            ->whereHas('bookingSlot', function ($q) use ($doctorId) {
                $q->where('doctor_id', $doctorId);
            })->orderBy('id', 'desc')->paginate(10);
    }

    public function getPrescriptionDetailsById($prescriptionId)
    {
        return $this->prescriptionRepository->with(['prescriptionMedicineDetail', 'bookingSlot'])->find($prescriptionId);
    }

    public function update($data, $prescriptionId)
    {
        try {
            $prescriptionPayload = Arr::except($data, ['_token', 'medicine_detail']);
            $prescriptionDetails = $this->prescriptionRepository->find($prescriptionId)->update($prescriptionPayload);
            PrescriptionMedicineDetail::where('prescription_id', $prescriptionId)->delete();
            foreach ($data['medicine_detail'] as $medicineDetails) {
                $freq = implode(',', $medicineDetails['frequency']);
                $medicineDetails['frequency'] = $freq;
                $medicineDetails['prescription_id'] = $prescriptionId;
                PrescriptionMedicineDetail::create($medicineDetails);
            }
            return ['status' => true, 'data' => $prescriptionDetails];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getmessage()];
        }
    }
    public function deletePrescription($prescriptionId)
    {
        try {
            $prescriptionDetails = $this->prescriptionRepository->find($prescriptionId);
            if (isset($prescriptionDetails)) {
                PrescriptionMedicineDetail::where('prescription_id', $prescriptionId)->delete();
                $prescriptionDetails->delete();
            }
            return ['status' => true];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getmessage()];
        }
    }
    public function deleteMedicineDetailsById($medicineDetailsId)
    {
        try {
            $prescriptionDetails = PrescriptionMedicineDetail::find($medicineDetailsId)->delete();
            return ['status' =>  $prescriptionDetails];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getmessage()];
        }
    }

    public function searchFilterPrescriptionDetails($searchKey)
    {
        $allPrescriptionDetails = $this->prescriptionRepository->with(['prescriptionMedicineDetail', 'bookingSlot']);
        if (isset($searchKey['search']) && !empty($searchKey['search'])) {
            // Search in doctor first name and last name
            $key = explode(' ', $searchKey['search']);
            if (count($key) > 1) {
                $allPrescriptionDetails->orWhereHas('bookingSlot.patient', function ($q) use ($key, $searchKey) {
                    $q->where('first_name', 'like', "%{$key[0]}%");
                    $q->where('last_name', 'like', "%{$key[1]}%");
                    $q->orWhere('display_name', 'like', "%{$searchKey['search']}%");
                    $q->orWhere('email', 'like', "%{$searchKey['search']}%");
                });
            } else {
                $allPrescriptionDetails->orWhereHas('bookingSlot.patient', function ($q) use ($searchKey) {
                    $q->where('first_name', 'like', "%{$searchKey['search']}%");
                    $q->where('last_name', 'like', "%{$searchKey['search']}%");
                    $q->orWhere('display_name', 'like', "%{$searchKey['search']}%");
                    $q->orWhere('email', 'like', "%{$searchKey['search']}%");
                });
            }
            // Search in Medicine name
            $allPrescriptionDetails->orWhereHas('prescriptionMedicineDetail', function ($q) use ($searchKey) {
                $q->where('medicine_name', 'like', "%{$searchKey['search']}%");
            });
            $allPrescriptionDetails->orWhere('description', 'like', "%{$searchKey['search']}%");
        }
        if (isset($searchKey['date']) && !empty($searchKey['date'])) {
            $allPrescriptionDetails->whereDate('created_at', $searchKey['date']);
        }
        if (isset($searchKey['meal_status'])) {
            $allPrescriptionDetails->whereHas('prescriptionMedicineDetail', function ($q) use ($searchKey) {
                $q->where('meal_status', $searchKey['meal_status']);
            });
        }
        if (isset($searchKey['patient_detail_id'])) {
            $patientId = $searchKey['patient_detail_id'];
            $allPrescriptionDetails->orWhereHas('bookingSlot.patient', function ($q) use ($patientId) {
                $q->where('id', $patientId);
            });
        }
        if (isset($searchKey['booking_detail_id'])) {
            $allPrescriptionDetails->where('booking_slot_id', $searchKey['booking_detail_id']);
        }
        return $allPrescriptionDetails->orderBy('id', 'desc')->paginate(10);
    }
}
