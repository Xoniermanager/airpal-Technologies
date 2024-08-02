<?php 
namespace App\Http\Services;

use App\Http\Repositories\BookingRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\UserRepository;

class DoctorDashboardServices
{
    private $bookingRepository;
    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function getTotalPatientsCounter($userId)
    {
      return $this->bookingRepository->getUniquePatientsCounterByDoctorId($userId);
    }
    public function getTodayAppointmentCounter($userId)
    {
      return $this->bookingRepository->getTodayAppointmentCounter($userId);
    }

    public function getAppointmentsByDoctorId($userId)
    {
        return $this->bookingRepository->getAppointmentsByDoctorId($userId);
    }
    public function getRecentAppointments($userId)
    {
        return $this->bookingRepository->getRecentAppointmentsByDoctorId($userId);
    }

    public function getUpComingAppointment($userId)
    {
        return $this->bookingRepository->getUpcomingAppointmentsByDoctorId($userId);
    }
    public function getRecentPatients($userId)
    {
        return $this->bookingRepository->getRecentPatientsByDoctorId($userId);
    }
    public function getTotalAppointment($userId)
    {
        return $this->bookingRepository->getTotalAppointmentByDoctorId($userId);
    }
    public function getAllUpcomingAppointments($userId)
    {
        return $this->bookingRepository->getAllUpcomingAppointmentsByDoctorId($userId);
    }
    public function getAllCanceledAppointments($userId)
    {
        return $this->bookingRepository->getAllCanceledAppointmentsByDoctorId($userId);
    }

    public function getAllConfirmedAppointments()
    {
        return $this->bookingRepository->getAllConfirmedAppointments($userId);
    }

    







    








    
}
