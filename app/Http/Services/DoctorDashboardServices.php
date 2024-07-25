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

    public function getTotalPatientsCounter()
    {
      return $this->bookingRepository->getUniquePatientsCounterByDoctorId(Auth::id());
    }
    public function getTodayAppointmentCounter()
    {
      return $this->bookingRepository->getTodayAppointmentCounter(Auth::id());
    }

    public function getAppointmentsByDoctorId()
    {
        return $this->bookingRepository->getAppointmentsByDoctorId(Auth::id());
    }
    public function getRecentAppointments()
    {
        return $this->bookingRepository->getRecentAppointmentsByDoctorId(Auth::id());
    }

    public function getUpComingAppointment()
    {
        return $this->bookingRepository->getUpcomingAppointmentsByDoctorId(Auth::id());
    }
    public function getRecentPatients()
    {
        return $this->bookingRepository->getRecentPatientsByDoctorId(Auth::id());
    }
    public function getTotalAppointment()
    {
        return $this->bookingRepository->getTotalAppointmentByDoctorId(Auth::id());
    }
    public function getAllUpcomingAppointments()
    {
        return $this->bookingRepository->getAllUpcomingAppointmentsByDoctorId(Auth::id());
    }
    public function getAllCanceledAppointments()
    {
        return $this->bookingRepository->getAllCanceledAppointmentsByDoctorId(Auth::id());
    }

    







    








    
}
