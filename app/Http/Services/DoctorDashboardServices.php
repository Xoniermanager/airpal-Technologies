<?php 
namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\BookingRepository;

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

    public function getAllConfirmedAppointments($userId)
    {
        return $this->bookingRepository->getAllConfirmedAppointments($userId);
    }

    public function getAppointmentGraphDataByDoctorId($doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)
        ->orderBy('booking_date')
        ->get()
        ->groupBy('booking_date');
    }
    public function gettingAppointmentGraphData($period)
    {   
        
        // Initialize period variables
        $daysInMonth    = Carbon::now()->daysInMonth;
        $bookingByMonth = array_fill(1, 12, 0); 
        $bookingByYear  = array_fill(Carbon::now()->year, 11, 0); 
        $bookingByDate  = array_fill(1, $daysInMonth, 0);
    
        // Fetch recent appointments
        $appointments = $this->getAppointmentGraphDataByDoctorId(auth::id());
    
        foreach ($appointments as $appointment) {
            foreach ($appointment as $appointmentData) {
                $date = Carbon::parse($appointmentData->booking_date);
    
                if ($period === 'monthly' || $period === 'currentMonth') {
                    $month = (int)$date->format('n');
                    $bookingByMonth[$month] += 1; // Count bookings for each month
    
                    if ($period === 'currentMonth' && $date->month === Carbon::now()->month) {
                        $day = (int)$date->format('j');
                        $bookingByDate[$day] += 1; // Count bookings for each day in the current month
                    }
                } elseif ($period === 'yearly') {
                    $year = $date->year;
                    if (!isset($bookingByYear[$year])) {
                        $bookingByYear[$year] = 0;
                    }
                    $bookingByYear[$year] += 1;
                }
            }
        }
        $result = [];
        if ($period === 'monthly') {
            foreach ($bookingByMonth as $month => $count) {
                $result[] = [$month, $count];
            }
        } elseif ($period === 'yearly') {
            foreach ($bookingByYear as $year => $count) {
                $result[] = [$year, $count];
            }
        } elseif ($period === 'currentMonth') {
            foreach ($bookingByDate as $day => $count) {
                $result[] = [$day, $count];
            }
        }
        return $result;
    }


    
}
