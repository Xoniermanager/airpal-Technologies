<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Http\Services\BookingServices;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\ServicesRepository;

class DoctorService
{
    private  $servicesRepository;
    private  $bookingServices;
    private $userRepository;
    public function __construct(ServicesRepository $servicesRepository, BookingServices $bookingServices, UserRepository $userRepository)
    {
        $this->servicesRepository = $servicesRepository;
        $this->bookingServices    = $bookingServices;
        $this->userRepository     = $userRepository;
    }

    public function getAllDoctorsList()
    {
        return $this->userRepository->where('role',config('airpal.roles.doctor'))->get();
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

    public function getAllPatientByDoctorId($doctorId, $searchKey = null)
    {
        $allBookingDetails = $this->bookingServices->doctorBookings($doctorId, $searchKey)->orderBy('booking_date', 'ASC')->orderBy('slot_start_time', 'ASC')->get()->groupBy('patient_id');
        $newPatients     = [];
        $regularPatients = [];
        $finalArray = '';
        foreach ($allBookingDetails as $userId => $bookingDetails) {
            $upcomingAppointment = [];
            $lastBookedAppointment  = [];

            foreach ($bookingDetails as $bookingDetail) {
                if ($bookingDetail->booking_date >= now()) {
                    $upcomingAppointment = $bookingDetail;
                    break;
                }
                $lastBookedAppointment  = $bookingDetail;
            }

            if (count($bookingDetails) > 1) {
                $regularPatients[$userId]['patient_details'] = $bookingDetails[0]['patient'];
                $regularPatients[$userId]['upcoming'] = $upcomingAppointment;
                $regularPatients[$userId]['last_booking'] = $lastBookedAppointment;
            } else {
                $newPatients[$userId]['patient_details'] = $bookingDetails[0]['patient'];
                $newPatients[$userId]['upcoming'] = $upcomingAppointment;
                $newPatients[$userId]['last_booking'] = $lastBookedAppointment;
            }
        }
        $finalArray =
            [
                'newPatients' => $newPatients,
                'regularPatients' => $regularPatients,
                'allPatients' => array_merge($regularPatients, $newPatients),
            ];
        return  $finalArray;
    }

    public function getDoctorCountsGroupedByRatings()
    {
    return  $this->userRepository
     ->select('allover_rating', DB::raw('count(*) as total_doctors'))
     ->where('role',config('airpal.roles.doctor'))
     ->orderby('allover_rating','asc')
     ->groupBy('allover_rating')
     ->get();
    }
}
