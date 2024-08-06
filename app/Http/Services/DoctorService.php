<?php

namespace App\Http\Services;

use App\Http\Repositories\ServicesRepository;

class DoctorService
{
    private  $servicesRepository;
    private  $bookingServices;
    public function __construct(ServicesRepository $servicesRepository, BookingServices $bookingServices)
    {
        $this->servicesRepository = $servicesRepository;
        $this->bookingServices = $bookingServices;
    }
    public function addService($serviceData)
    {
        return $this->servicesRepository->create($serviceData);
    }
    public function updateService($updateData, $id)
    {
        return $this->servicesRepository->find($id)->update($updateData);
    }
    public function deleteService($id)
    {
        return $this->servicesRepository->delete($id);
    }

    public function getServicePaginated()
    {
        return $this->servicesRepository->paginate(10)->setPath(route('admin.service.index'));
    }

    public function getServiceAjaxCall()
    {
        return $this->servicesRepository->all();
    }

    public function getAllPatientByDoctorId($doctorId)
    {
        $allBookingDetails = $this->bookingServices->doctorBookings($doctorId)->orderBy('booking_date','DESC')->get()->groupBy('patient_id');
        $newPatients     = [];
        $regularPatients = [];
        $finalArray = '';
        foreach ($allBookingDetails as $bookingDetails) {
            if (count($bookingDetails) > 1) {
                $regularPatients[] = $bookingDetails[0]['patient'];
            } else {
                $newPatients[] = $bookingDetails[0]['patient'];
            }
        }
        $finalArray =
            [
                'newPatients' => $newPatients,
                'regularPatients' => $regularPatients,
                'allPatients' => array_merge($regularPatients, $newPatients)
            ];
        return  $finalArray;
    }
}

