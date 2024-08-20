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

    public function getTotalPatientsCounter($doctorId)
    {
        return $this->bookingRepository->getUniquePatientsCounterByDoctorId($doctorId);
    }
    public function gettingTotalAttendedBookings($doctorId)
    {
        return $this->bookingRepository->gettingTotalAttendedBookings($doctorId);
    }
    public function getTodayAppointmentCounter($doctorId)
    {
        return $this->bookingRepository->getTodayAppointmentCounter($doctorId);
    }

    public function getAppointmentsByDoctorId($doctorId)
    {
        return $this->bookingRepository->getAppointmentsByDoctorId($doctorId);
    }
    public function getRecentAppointments($doctorId)
    {
        return $this->bookingRepository->getRecentAppointmentsByDoctorId($doctorId);
    }

    public function getUpComingAppointment($doctorId)
    {
        return $this->bookingRepository->getUpcomingAppointmentsByDoctorId($doctorId);
    }
    public function getRecentPatients($doctorId)
    {
        return $this->bookingRepository->getRecentPatientsByDoctorId($doctorId);
    }
    public function getTotalAppointment($doctorId)
    {
        return $this->bookingRepository->getTotalAppointmentByDoctorId($doctorId);
    }
    public function getAllUpcomingAppointments($doctorId)
    {
        return $this->bookingRepository->getAllUpcomingAppointmentsByDoctorId($doctorId);
    }
    public function getAllCanceledAppointments($doctorId)
    {
        return $this->bookingRepository->getAllCanceledAppointmentsByDoctorId($doctorId);
    }

    public function getAllConfirmedAppointments($doctorId)
    {
        return $this->bookingRepository->getAllConfirmedAppointments($doctorId);
    }

    public function getAppointmentGraphDataByDoctorId($doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)
            ->orderBy('booking_date')
            ->get()
            ->groupBy('booking_date');
    }
    public function gettingAppointmentGraphData($period, $doctorId)
    {

        // Initialize period variables
        $daysInMonth    = Carbon::now()->daysInMonth;
        $bookingByMonth = array_fill(1, 12, 0);
        $bookingByYear  = array_fill(Carbon::now()->year, 11, 0);
        $bookingByDate  = array_fill(1, $daysInMonth, 0);

        // Fetch recent appointments
        $appointments = $this->getAppointmentGraphDataByDoctorId($doctorId);

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
