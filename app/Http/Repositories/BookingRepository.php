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

    public function searchDoctorAppointments($filterParams)
    {


        $query = $this->model->with('patient')->newQuery();
        $key   = $filterParams['key'] ?? '';

        /*
        Managing filter for :
            1. today appointments, 
            2. upcoming appointments and
            3. cancelled appointments
        */
        switch ($key) {
            case 'today':
                $query->where('booking_date', Carbon::now()->toDateString())
                    ->where('status', '!=', 'cancelled');
                break;
            case 'upcoming':
                $query->where('booking_date', '>', Carbon::now()->toDateString())->where('status', '!=', 'cancelled');
                break;
            case 'cancelled':
                $query->where('status', 'cancelled');
                break;
            case 'confirmed':
                $query->where('status', 'confirmed');
                break;
        }
        // Using selected date filter from calendar
        if (isset($filterParams['dateSearch']) && !empty($filterParams['dateSearch'])) {
            $query->where('booking_date', '=', $filterParams['dateSearch']);
        }

        // Using provided doctor id to filter
        if (isset($filterParams['doctorId']) && !empty($filterParams['doctorId'])) {
            $query->where('doctor_id', '=', $filterParams['doctorId']);
        }

        // Using provided doctor id to filter
        if (isset($filterParams['patientId']) && !empty($filterParams['patientId'])) {
            $query->where('patient_id', '=', $filterParams['patientId']);
        }

        // Using search keyword to find appointments
        if (isset($filterParams['searchKey']) && !empty($filterParams['searchKey']))
         {

            $searchKey = explode(' ', $filterParams['searchKey']);
            $query->whereHas('patient', function ($query) use ($searchKey) {
                $query->where('first_name', 'like', "%{$searchKey[0]}%");
                $query->orWhere('last_name', 'like', "%{$searchKey[0]}%");
                $query->orWhere('display_name', 'like', "%{$searchKey[0]}%");
                if (count($searchKey) > 1) {
                    foreach ($searchKey as $key) {
                        $query->orWhere('first_name', 'like', "%{$key}%");
                        $query->orWhere('last_name', 'like', "%{$key}%");
                        $query->orWhere('display_name', 'like', "%{$key}%");
                    }
                }
            });
        }
        // Using search keyword to find appointments
        if (isset($filterParams['pSearchKey']) && !empty($filterParams['pSearchKey'])) {
            $pSearchKey = $filterParams['pSearchKey'];
            $query->whereHas('user', function ($query) use ($pSearchKey) {
                $query->where('first_name', 'like', "%{$pSearchKey}%");
                $query->orWhere('last_name', 'like', "%{$pSearchKey}%");
            });
        }
        return $query->paginate(9);
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
            ->where('status', '!=', 'cancelled')
            ->count();
    }

    public function gettingTotalAttendedBookings($doctorId)
    {
        return $this->where('doctor_id', $doctorId)
            ->whereDate('booking_date', '<', Carbon::today())
            ->where('status', '!=', 'cancelled')
            ->count();
    }

    public function getRecentAppointmentsByDoctorId($doctorId)
    {
        return $this->with('patient')->where('doctor_id', $doctorId)
            ->orderBy('created_at', 'desc')
            ->where('status', 'requested')
            ->take(4)
            ->get();
    }

    public function getUpcomingAppointmentsByDoctorId($doctorId)
    {
        $todayDate = Carbon::now()->toDateString();
        return  $this->where('doctor_id', $doctorId)
            ->where('booking_date', '>=', $todayDate)
            ->where('status', '!=', 'cancelled')
            ->orderBy('slot_start_time', 'asc')
            ->first();
    }

    public function getRecentPatientsByDoctorId($doctorId)
    {
        return $this->with('patient')->where('doctor_id', $doctorId)
            ->where('booking_date', '<', Carbon::now())
            ->distinct('patient_id')
            ->orderBy('booking_date', 'asc')
            ->take(4)
            ->get();
    }

    public function getAllUpcomingAppointmentsByDoctorId($doctorId)
    {
        $todayDate = Carbon::now()->toDateString();
        return  $this->with('patient')->where('doctor_id', $doctorId)
            ->where('booking_date', '>', $todayDate)
            ->where('status', '!=', 'cancelled')
            ->get();
    }

    public function getAllCanceledAppointmentsByDoctorId($doctorId)
    {
        return  $this->where('doctor_id', $doctorId)
            ->where('status', '=', 'cancelled')
            ->get();
    }

    public function getAllConfirmedAppointments($doctorId)
    {
        return  $this->where('doctor_id', $doctorId)
            ->where('status', '=', 'confirmed')
            ->get();
    }

    public function gettingPatientInvoices($patientId)
    {
        return $this->where('patient_id', $patientId)
            ->where('status', '=', 'confirmed');
    }


    public function getPatientAllConfirmedAppointments($patientId)
    {
        return  $this->where('patient_id', $patientId)
            ->where('status', '=', 'confirmed')
            ->get();
    }
}
