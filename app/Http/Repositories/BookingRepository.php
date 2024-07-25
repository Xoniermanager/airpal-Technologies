<?php

namespace App\Http\Repositories;

use Carbon\Carbon;
use App\Models\BookingSlots;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class BookingRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BookingSlots::class;
    }

    public function newQuery()
    {
        return $this->model->newQuery();
    }

    public function filter($filterKey, $patientId = null, $doctorId = null)
    {

        $query = $this->model->newQuery();

        if ($filterKey == 'completed') {
            $query->where('status', 'completed');
        } elseif ($filterKey == 'canceled') {
            $query->where('status', 'canceled');
        } elseif ($filterKey == 'today') {
            $query->where('booking_date', Carbon::now()->toDateString());
        } elseif ($filterKey == 'upcoming') {
            $query->where('booking_date', '>', Carbon::now()->toDateString());
        } elseif ($filterKey == 'all') {
        }

        if (!is_null($patientId) && $patientId !== '') {
            $query->where('patient_id', $patientId);
        }

        if (!is_null($doctorId) && $doctorId !== '') {
            $query->where('doctor_id', $doctorId);
        }

        return $query->get();
    }

    public function getTotalAppointmentByDoctorId($doctorId)
    {
        return $this->where('doctor_id', $doctorId)
            ->count('patient_id');
    }


    public function getUniquePatientsCounterByDoctorId($doctorId)
    {
        return $this->where('doctor_id', $doctorId)
            ->distinct('patient_id')
            ->count('patient_id');
    }

    public function getTodayAppointmentCounter($doctorId)
    {
        return $this->where('doctor_id', $doctorId)
            ->whereDate('booking_date', Carbon::today())
            ->count();
    }

    public function getRecentAppointmentsByDoctorId($doctorId)
    {
        return $this->where('doctor_id', $doctorId)
            ->where('booking_date', '>', Carbon::now())
            ->distinct('patient_id')
            ->orderBy('booking_date', 'asc')
            ->take(4)
            ->get();
    }

    public function getUpcomingAppointmentsByDoctorId($doctorId)
    {
        $todayDate = Carbon::now()->toDateString();
        return  $this->where('doctor_id', $doctorId)
            ->where('booking_date', '>=', $todayDate)
            ->where('status', '!=', 'canceled')
            ->orderBy('slot_start_time', 'asc')
            ->first();
    }

    public function getRecentPatientsByDoctorId($doctorId)
    {
        return $this->where('doctor_id', $doctorId)
            ->where('booking_date', '<', Carbon::now())
            ->distinct('patient_id')
            ->orderBy('booking_date', 'asc')
            ->take(4)
            ->get();
    }

    public function getAllUpcomingAppointmentsByDoctorId($doctorId)
    {
        $todayDate = Carbon::now()->toDateString();
        return  $this->where('doctor_id', $doctorId)
            ->where('booking_date', '>', $todayDate)
            // ->where('status', '!=', 'canceled')
            ->get();
    }

    public function getAllCanceledAppointmentsByDoctorId($doctorId)
    {
        $todayDate = Carbon::now()->toDateString();
        return  $this->where('doctor_id', $doctorId)
                ->where('status', '=', 'canceled')
                ->get();
    }
}
