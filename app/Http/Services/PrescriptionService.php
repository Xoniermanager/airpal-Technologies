<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Arr;
use App\Http\Repositories\PrescriptionRepository;
use App\Models\PrescriptionMedicineDetail;
use App\Models\PrescriptionTest;
use Barryvdh\DomPDF\Facade\Pdf;

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
            $prescriptionPayload = Arr::except($data, ['_token', 'medicine_detail', 'test']);
            if (isset($data['advice']) && count($data['advice']) > 0) {
                $prescriptionPayload['advice'] = implode(',', $data['advice']);
            }
            $prescriptionDetails = $this->prescriptionRepository->create($prescriptionPayload);
            foreach ($data['medicine_detail'] as $medicineDetails) {
                $freq = implode(',', $medicineDetails['frequency']);
                $medicineDetails['frequency'] = $freq;
                $medicineDetails['prescription_id'] = $prescriptionDetails->id;
                PrescriptionMedicineDetail::create($medicineDetails);
            }
            if (isset($data['test']) && count($data['test']) > 0) {
                $filtered = array_filter($data['test'], function ($key) {
                    return $key['name'] != '' || $key['description'] != null;
                });
                if (count($filtered) > 0) {
                    foreach ($data['test'] as $testDetails) {
                        $testDetails['prescription_id'] = $prescriptionDetails->id;
                        PrescriptionTest::create($testDetails);
                    }
                }
            }
            return ['status' => true, 'data' => $prescriptionDetails];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getmessage()];
        }
    }

    public function getAllPrescriptionByDoctorId($doctorId)
    {
        return $this->prescriptionRepository->with(['prescriptionMedicineDetail', 'bookingSlot','bookingSlot.patient'])
            ->whereHas('bookingSlot', function ($q) use ($doctorId) {
                $q->where('doctor_id', $doctorId);
            })->orderBy('id', 'desc')->paginate(10);
    }

    public function getPrescriptionDetailsById($prescriptionId)
    {
        return $this->prescriptionRepository->with(['prescriptionMedicineDetail', 'prescriptionTest', 'bookingSlot'])->find($prescriptionId);
    }

    public function update($data, $prescriptionId)
    {
        try {
            $prescriptionPayload = Arr::except($data, ['_token', 'medicine_detail', 'test']);
            if (isset($data['advice']) && count($data['advice']) > 0) {
                $prescriptionPayload['advice'] = implode(',', $data['advice']);
            }
            $prescriptionDetails = $this->prescriptionRepository->find($prescriptionId)->update($prescriptionPayload);
            PrescriptionMedicineDetail::where('prescription_id', $prescriptionId)->delete();
            foreach ($data['medicine_detail'] as $medicineDetails) {
                $freq = implode(',', $medicineDetails['frequency']);
                $medicineDetails['frequency'] = $freq;
                $medicineDetails['prescription_id'] = $prescriptionId;
                PrescriptionMedicineDetail::create($medicineDetails);
            }
            if (isset($data['test']) && count($data['test']) > 0) {
                $filtered = array_filter($data['test'], function ($key) {
                    return $key['name'] != '' || $key['description'] != null;
                });
                if (count($filtered) > 0)
                {
                    PrescriptionTest::where('prescription_id', $prescriptionId)->delete();
                    foreach ($data['test'] as $testDetails) {
                        $testDetails['prescription_id'] = $prescriptionId;
                        PrescriptionTest::create($testDetails);
                    }
                }
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
            $medicalDetails = PrescriptionMedicineDetail::find($medicineDetailsId)->delete();
            return ['status' =>  $medicalDetails];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getmessage()];
        }
    }
    public function deleteTestDetailsById($testDetailsId)
    {
        try {
            $testDetails = PrescriptionTest::find($testDetailsId)->delete();
            return ['status' =>  $testDetails];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getmessage()];
        }
    }

    public function searchFilterPrescriptionDetails($searchKey)
    {
        $allPrescriptionDetails = $this->prescriptionRepository->with(['prescriptionMedicineDetail', 'bookingSlot','bookingSlot.patient']);
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

    public function downloadPrescriptionPdf($prescriptionId)
    {
        $prescriptionDetails =  $this->getPrescriptionDetailsById($prescriptionId);
        return PDF::loadView('prescription_pdf_temp', ['webView' => false, 'prescriptionDetails' => $prescriptionDetails]);
    }
}
