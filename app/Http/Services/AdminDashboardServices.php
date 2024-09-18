<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\Payment;
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
        $doctorList = $this->userRepository->where('role', config('airpal.roles.doctor'))
            ->with('bookedAppointmentsOfDoctor.payments')
            ->get();

        $patientList     = $this->userRepository->where('role', config('airpal.roles.patient'))->get();
        $appointmentList = $this->bookingServices->all();

        return [
            'total_doctors'      => $doctorList->count(),
            'total_patients'     => $patientList->count(),
            'total_appointments' => $appointmentList->count(),
            'doctor_list'        => $doctorList->take(5),
            'patient_list'       => $patientList->take(5),
            'appointments_list'  => $appointmentList->take(5),
            'totalRevenue'       => Payment::sum('amount')

        ];
    }

    public function gettingAppointmentGraphData($period)
    {

        // Initialize period variables
        $daysInMonth    = Carbon::now()->daysInMonth;
        $bookingByMonth = array_fill(1, 12, 0);
        $bookingByYear  = array_fill(Carbon::now()->year, 11, 0);
        $bookingByDate  = array_fill(1, $daysInMonth, 0);

        if (empty($period)) {
            $period = "currentMonth";
        }

        // Fetch recent appointments
        $appointments = $this->bookingServices->getAllAppointmentGraphData();
        foreach ($appointments as $appointment) {
            foreach ($appointment as $appointmentData) {
                $date = Carbon::parse($appointmentData->booking_date);
                if ($period == 'monthly' || $period == 'currentMonth') {
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

    public function gettingRevenueGraphData($period)
{
    // Initialize period variables
    $daysInMonth = Carbon::now()->daysInMonth;
    $bookingByMonth = array_fill(1, 12, ['count' => 0, 'revenue' => 0]);
    $bookingByYear  = array_fill(Carbon::now()->year, 11, ['count' => 0, 'revenue' => 0]);
    $bookingByDate  = array_fill(1, $daysInMonth, ['count' => 0, 'revenue' => 0]);

    if (empty($period)) {
        $period = "currentMonth";
    }

    // Retrieve appointments with payment details
    $appointments = $this->bookingServices->getAllRevenueGraphDataAdmin();

    // Debug: Check if appointments are being fetched correctly
    if ($appointments->isEmpty()) {
        dd("No appointments found.");
    }

    foreach ($appointments as $appointment) {
        foreach ($appointment as $appointmentData) {
            // Corrected: Parse the booking date, not the amount
            $date = Carbon::parse($appointmentData->created_at); // Assuming 'created_at' is the booking date
            $amount = $appointmentData->payments->amount ?? 0; // Retrieve payment amount, default to 0 if null

            // Handle monthly and currentMonth periods
            if ($period == 'monthly' || $period == 'currentMonth') {
                $month = (int)$date->format('n');

                // Increment count and revenue for the month
                $bookingByMonth[$month]['count'] += 1;
                $bookingByMonth[$month]['revenue'] += $amount;

                // For currentMonth, increment count and revenue for the day
                if ($period === 'currentMonth' && $date->month === Carbon::now()->month) {
                    $day = (int)$date->format('j');
                    $bookingByDate[$day]['count'] += 1;
                    $bookingByDate[$day]['revenue'] += $amount;
                }
            }

            // Handle yearly period
            if ($period === 'yearly') {
                $year = $date->year;

                // Increment count and revenue for the year
                if (!isset($bookingByYear[$year])) {
                    $bookingByYear[$year] = ['count' => 0, 'revenue' => 0];
                }

                $bookingByYear[$year]['count'] += 1;
                $bookingByYear[$year]['revenue'] += $amount;
            }
        }
    }

    // Prepare result for graph
    $result = [];
    if ($period === 'monthly') {
        foreach ($bookingByMonth as $month => $data) {
            $result[] = [$month, $data['revenue']];
        }
    } elseif ($period === 'yearly') {
        foreach ($bookingByYear as $year => $data) {
            $result[] = [$year, $data['revenue']];
        }
    } elseif ($period === 'currentMonth') {
        foreach ($bookingByDate as $day => $data) {
            $result[] = [$day, $data['revenue']];
        }
    }

    return $result;
}



    

    // public function gettingRevenueGraphData($period)
    // {

    //     // Initialize period variables
    //     $daysInMonth    = Carbon::now()->daysInMonth;
    //     $bookingByMonth = array_fill(1, 12, 0);
    //     $bookingByYear  = array_fill(Carbon::now()->year, 11, 0);
    //     $bookingByDate  = array_fill(1, $daysInMonth, 0);

    //     if (empty($period)) {
    //         $period = "currentMonth";
    //     }


    //     $appointments = $this->bookingServices->getAllRevenueGraphDataAdmin();

    //     foreach ($appointments as $appointment) {
    //         foreach ($appointment as $appointmentData) {
    //             $amount = $appointmentData->payments->amount ?? 0;
    //             $date = Carbon::parse($amount);
    //             if ($period == 'monthly' || $period == 'currentMonth') {
    //                 $month = (int)$date->format('n');

    //                 $bookingByMonth[$month] += 1; // Count bookings for each month

    //                 if ($period === 'currentMonth' && $date->month === Carbon::now()->month) {
    //                     $day = (int)$date->format('j');
    //                     $bookingByDate[$day] += 1; // Count bookings for each day in the current month
    //                 }
    //             } elseif ($period === 'yearly') {
    //                 $year = $date->year;
    //                 if (!isset($bookingByYear[$year])) {
    //                     $bookingByYear[$year] = 0;
    //                 }
    //                 $bookingByYear[$year] += 1;
    //             }
    //         }
    //     }

    //     $result = [];
    //     if ($period === 'monthly') {
    //         foreach ($bookingByMonth as $month => $count) {
    //             $result[] = [$month, $count];
    //         }
    //     } elseif ($period === 'yearly') {
    //         foreach ($bookingByYear as $year => $count) {
    //             $result[] = [$year, $count];
    //         }
    //     } elseif ($period === 'currentMonth') {
    //         foreach ($bookingByDate as $day => $count) {
    //             $result[] = [$day, $count];
    //         }
    //     }
    //     return $result;
    // }
}
