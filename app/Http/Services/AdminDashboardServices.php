<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

class AdminDashboardServices
{
    private $userRepository;
    private $bookingServices;

    public function __construct(UserRepository $userRepository, BookingServices $bookingServices)
    {
        $this->userRepository = $userRepository;
        $this->bookingServices = $bookingServices;
    }
    public function getDashboardData()
    {

        // Fetch the data from the repositories
        $doctorList      = $this->userRepository->where('role', config('airpal.roles.doctor'))->get();
        $patientList     = $this->userRepository->where('role', config('airpal.roles.patient'))->get();
        $appointmentList = $this->bookingServices->all();


        // Prepare the dashboard data array
       return [
            'total_doctors'      => $doctorList->count(),
            'total_patients'     => $patientList->count(),
            'total_appointments' => $appointmentList->count(),
            'doctor_list'        => $doctorList->take(5),
            'patient_list'       => $patientList->take(5),
            'appointments_list'  => $appointmentList->take(5),
        ];
    }
}
