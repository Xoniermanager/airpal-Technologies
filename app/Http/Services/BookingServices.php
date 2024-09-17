<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Jobs\BookedSlotMailJob;
use App\Jobs\GenerateInvoicePdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Jobs\DoctorAppointmentQueryMailJob;
use App\Http\Repositories\BookingRepository;
use App\Jobs\UpdateMeetingIdJob;

class BookingServices
{
    private $bookingRepository;
    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }
    public function store($data)
    {

        $slot = $data->booking_slot_time;
        // Split the string and remove "AM" or "PM"
        list($start_time, $end_time) = array_map(function ($time) {
            return str_replace(['AM', 'PM'], '', $time);
        }, explode(' - ', $slot));

        // uploading symptoms image of patient
        $patient  = User::find($data->patient_id);
        if (isset($data->image) && !empty($data->image)) {
            $filePath = uploadingImageorFile($data->image, 'booking-symptoms', $patient->first_name);
        }

        $payload = [
            'doctor_id'  => $data->doctor_id,
            'patient_id' => $data->patient_id,
            'booking_date'   =>  $data->booking_date,
            'slot_start_time' =>  $start_time,
            'slot_end_time'  =>  $end_time,
            'insurance'  =>  $data->insurance,
            'note' => $data->description,
            'symptoms' => $data->symptoms,
            'image' => $filePath ?? '',
        ];

        $bookedSlot  =  $this->bookingRepository->create($payload);
        if ($bookedSlot) {
            $pdfPath = storage_path('app/public/' . $data->doctor_id . '/invoices/invoice-pdf-' . $bookedSlot->id . '.pdf');


            // generating invoice against booking
            GenerateInvoicePdf::dispatch($bookedSlot);

            // sending mail with invoice attachments
            BookedSlotMailJob::dispatch($bookedSlot, $pdfPath);

            $encryptedBookingId = Crypt::encryptString($bookedSlot->id);
            $base64Encoded  = base64_encode($encryptedBookingId);
            $urlSafeEncoded = urlencode($base64Encoded);
            $url = route('doctor.disease-details', ['booking_id' => $urlSafeEncoded]);

            $mailDataAndLink = [
                'link' => $url
            ];

            // sending mail for query about disease
            DoctorAppointmentQueryMailJob::dispatch($mailDataAndLink);
            // return redirect()->route('success.index')->with([
            //     'booking_date' => $data->booking_date,
            //     'bookingSlotTime' => $data->booking_slot_time,
            //     'doctorId' => $data->doctor_id,
            // ]);
            return $bookedSlot;
        }
    }

    public function update($data, $id)
    {
        return $this->bookingRepository->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->bookingRepository->find($id)->delete();
    }

    public function getPaginateData()
    {
        return $this->bookingRepository->paginate(12);
    }

    public function all()
    {
        return $this->bookingRepository->all();
    }

    public function slotDetails($data)
    {
        return $this->bookingRepository
            ->where('doctor_id', $data['doctor_id'])
            ->where('booking_date', $data['date']);
    }

    public function doctorBookings($id, $searchKey = null)
    {
        $queryDetails =  $this->bookingRepository->where('doctor_id', $id)->with(['patient', 'prescription']);

        // Using search keyword to find appointments
        if (isset($searchKey) && !empty($searchKey)) {
            $searchKey = explode(' ', $searchKey);
            $queryDetails = $queryDetails->whereHas('patient', function ($query) use ($searchKey) {
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
        return $queryDetails;
    }
    public function patientBookings($id)
    {
        return $this->bookingRepository->where('patient_id', $id);
    }

    public function getBookingSlotById($id)
    {
        return $this->bookingRepository->where('id', $id);
    }

    public function doctorCurrentDateBookings($id)
    {
        return $this->doctorBookings($id)->where('booking_date', Carbon::now()->toDateString())->with('patient');
    }
    public function appointmentsById($id)
    {
        return $this->bookingRepository->where('id', $id)->with(['patient', 'doctor']);
    }

    public function doctorUpcomingBookings($id)
    {
        return $this->doctorBookings($id)
            ->where('booking_date', '>', Carbon::now()->toDateString())
            ->where('status', '!=', 'cancelled');
    }
    public function patientUpcomingBookings($id)
    {
        return $this->patientBookings($id)->where('booking_date', '>', Carbon::now()->toDateString())->with('user');
    }

    public function searchDoctorAppointments($filterParams)
    {
        return  $this->bookingRepository->searchDoctorAppointments($filterParams);
    }

    public function searchPatientsAppointments($filterParams)
    {
        return  $this->bookingRepository->searchPatientsAppointments($filterParams);
    }

    public function doctorAppointmentSearch($searchKey, $doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)
            ->whereHas('patient', function ($query) use ($searchKey) {
                $query->where('first_name', 'like', "%{$searchKey}%");
            })->get();
    }

    public function requestedAppointment($id)
    {
        return $this->doctorBookings($id)
            ->whereDate('booking_date', '>=', date('Y-m-d'))
            ->where('status', 'requested')
            ->orderBy('created_at', 'desc');
    }


    public function filterRequestAppointments($filterKey, $doctorId)
    {
        $query = $this->bookingRepository->query();

        // Add the common status filter
        $query->where('status', 'requested');

        // Add additional filters based on the filter key
        switch ($filterKey) {
            case 'month':
                $query->whereMonth('booking_date', Carbon::now()->month);
                break;
            case 'today':
                $query->whereDate('booking_date', Carbon::now()->toDateString());
                break;
            case 'week':
                $startDate = Carbon::today();
                $endDate   = Carbon::today()->addDays(7);
                $query->whereBetween('booking_date', [$startDate, $endDate]);
                break;
            case 'all':
                break;
        }

        if (!is_null($doctorId) && $doctorId !== '') {
            $query->where('doctor_id', $doctorId);
        }


        return $query->get();
    }
    public function updateStatus($status, $id)
    {
        $bookingDetails = $this->bookingRepository->find($id)->update(['status' => $status]);
        if ($bookingDetails == true) {
            if ($status == 'confirmed') {
                UpdateMeetingIdJob::dispatch($id);
            }
        }
    }

    public function filterOnMyPatient($filterData)
    {
        $key = $filterData['key'];
        $doctorId = $filterData['doctorId'];
        $searchKey = isset($filterData['searchKey']) ? $filterData['searchKey'] : '';

        $appointments = $this->doctorBookings($doctorId)->get();
        $patientBookings = $appointments->groupBy('patient_id')->map(function ($appointments) {
            return $appointments->count();
        });

        $filteredAppointments = $appointments->filter(function ($appointment) use ($patientBookings, $key) {
            $patientId = $appointment->patient_id;
            $count = $patientBookings[$patientId];
            if ($key == 'new') {
                return $count == 1;
            } elseif ($key == 'regular') {
                return $count > 1;
            }
            return false;
        });

        $filteredPatientIds = $filteredAppointments->pluck('patient_id')->unique();
        $uniquePatients = User::whereIn('id', $filteredPatientIds)
            ->where('first_name', 'LIKE', "%$searchKey%")
            ->get();

        return $uniquePatients;
    }


    public function getAllAppointmentCounter($id)
    {
        $allAppointments       = $this->doctorBookings($id)->count();
        $todayAppointments     =  $this->bookingRepository->getTodayAppointmentCounter($id);
        $cancelledAppointments = $this->bookingRepository->getAllCanceledAppointmentsByDoctorId($id)->count();
        $confirmedAppointments = $this->bookingRepository->getAllConfirmedAppointments($id)->count();
        $completedAppointments  = $this->bookingRepository->getAllCompletedAppointmentsByDoctorId($id)->count();
        $upcomingAppointments  = $this->bookingRepository->getAllUpcomingAppointmentsByDoctorId($id)->count();

        // Here returning all patient type (status,upcoming,cancelled,confirmed) counter for (doctor profile)
        return
            [
                'allAppointments'       => $allAppointments ?? 0,
                'todayAppointments'     => $todayAppointments ?? 0,
                'upcomingAppointments'  => $upcomingAppointments ?? 0,
                'confirmedAppointments' => $confirmedAppointments ?? 0,
                'cancelledAppointments' => $cancelledAppointments ?? 0,
                'completedAppointments' => $completedAppointments ?? 0
            ];
    }

    public function getAllAppointmentPatientCounter($patientId)
    {
        $todayDate = Carbon::now()->toDateString();
        // Here returning all patient type (status,upcoming,cancelled,confirmed) counter for (doctor profile)
        return
            [
                'allAppointments'       => $this->bookingRepository->where('patient_id', $patientId)->with('patient')->count(),

                'todayAppointments'     => $this->bookingRepository->where('patient_id', $patientId)
                    ->whereDate('booking_date', Carbon::today())
                    ->where('status', '!=', 'cancelled')
                    ->count(),

                'upcomingAppointments'  => $this->bookingRepository->where('patient_id', $patientId)
                    ->where('booking_date', '>', $todayDate)
                    ->where('status', '!=', 'cancelled')
                    ->get()->count(),

                'confirmedAppointments' => $this->bookingRepository->where('patient_id', $patientId)
                    ->where('status', '=', 'confirmed')
                    ->get()->count(),
                'cancelledAppointments' => $this->bookingRepository->where('doctor_id', $patientId)
                    ->where('status', '=', 'cancelled')
                    ->get()->count(),
                'completedAppointments' => $this->bookingRepository->where('patient_id', $patientId)
                    ->where('status', '=', 'completed')
                    ->get()->count(),
            ];
    }

    public function getAllRecentAppointmentsByDoctorId($doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)
            ->where('booking_date', '<', Carbon::now())
            ->with('payments')
            ->get()
            ->groupBy('booking_date');
    }

    public function getAllDoctorRevenueData($doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)
        ->with('payments')
        ->get()
        ->groupBy('booking_date');
    }

    public function gettingRevenueDetailForChart($period, $doctorId)
    {
        // Initialize variables
        $daysInMonth = Carbon::now()->daysInMonth;
        $revenueByMonth = array_fill(1, 12, 0);
        $revenueByYear  = array_fill(Carbon::now()->year, 11, 0);;
        $revenueByDate  = array_fill(1, $daysInMonth, 0);

        // Fetch recent appointments
        $revenueData = $this->getAllDoctorRevenueData($doctorId);

        // dd(   $revenueData);

        foreach ($revenueData as $appointment) {
            foreach ($appointment as $appointmentData) {
                $date = Carbon::parse($appointmentData->booking_date);
                $amount = $appointmentData->payments->amount ?? 0;

                if ($period === 'monthly' || $period === 'currentMonth') {
                    $month = (int)$date->format('n');
                    $revenueByMonth[$month] += $amount;

                    if ($period === 'currentMonth' && $date->month === Carbon::now()->month) {
                        $day = (int)$date->format('j');
                        $revenueByDate[$day] += $amount;
                    }
                } elseif ($period === 'yearly') {
                    $year = $date->year;
                    if (!isset($revenueByYear[$year])) {
                        $revenueByYear[$year] = 0;
                    }
                    $revenueByYear[$year] += $amount;
                }
            }
        }

        $result = [];
        if ($period === 'monthly') {
            foreach ($revenueByMonth as $month => $sum) {
                $result[] = [$month, $sum];
            }
        } elseif ($period === 'yearly') {
            foreach ($revenueByYear as $year => $totalAmount) {
                $result[] = [$year, $totalAmount];
            }
        } elseif ($period === 'currentMonth') {
            foreach ($revenueByDate as $day => $sum) {
                $result[] = [$day, $sum];
            }
        }

        return $result;
    }


    public function getAllAppointmentsByDoctorId($doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)
            ->with('patient')
            ->get()
            ->pluck('patient')
            ->unique('id');
    }

    public function getAllBookingDetailsByDoctorAndPatientId($patientId, $doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)->where('patient_id', $patientId)->with(['user', 'patient'])->get();
    }

    /**
     * Getting the most recent or say future booking date for the selected doctor
     */
    public function retrieveLastBookingDate($doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)->orderBy('booking_date', 'desc')->first();
    }

    public function getPatientAllConfirmBookings($patientId, $doctorId)
    {
        return $this->bookingRepository->getPatientAllAppointmentsBasedOnDoctor($patientId, $doctorId);
    }

    public function getAllAppointmentDetailsByDoctorId($doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)->with('patient')->get();
    }
    public function getBookingDetailsByMeetingId($meetingId)
    {
        return $this->bookingRepository->where('meeting_id', $meetingId)->first(['booking_date', 'slot_start_time', 'slot_end_time']);
    }

    // Get doctor active booking slots
    public function getDoctorActiveBookingSlots($doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)
            ->whereIn('status', ['requested', 'confirmed'])
            ->whereDate('booking_date', ">=", Carbon::now())
            ->orderBy('booking_date', 'desc')
            ->get();
    }
    public function allCompleteAppointmentByDoctorId($doctorId)
    {
        return $this->bookingRepository->where('doctor_id', $doctorId)->where('status', 'completed')->with(['patient', 'prescription'])->orderBy('booking_date', 'desc')->paginate(10);
    }
    public function allCompleteAppointmentByPatientId($patientId)
    {
        return $this->bookingRepository->where('patient_id', $patientId)->where('status', 'completed')->with(['user', 'prescription'])->orderBy('booking_date', 'desc')->paginate(10);
    }

    /**
     * Checks if current booking requires payment if yes then returns yes with required payment details
     * Check the booking fee details
     * @param bookingDate
     * @param slotStartTime
     * @param slotEndTime
     * @param doctorId
     * @return Fee details
     */
    public function getBookingFee($booking)
    {


        // Write script here to calculate the booking fee using above details
        $fee = 10;
        return $fee;
    }

    /**
     * Update payment required to be true/false based on payment is required for booking or not ?
     */
    public function updatePaymentRequired($bookingId, $requiredStatus)
    {
        return $this->bookingRepository->where('id', $bookingId)->update(['payment_required'    =>  $requiredStatus]);
    }


    public function getAllAppointmentGraphData()
    {
        return $this->bookingRepository
        ->orderBy('booking_date')
        ->get()
        ->groupBy('booking_date');
    }

    public function getAllRevenueGraphDataAdmin()
    {
        return $this->bookingRepository
        // ->where('booking_date', '<', Carbon::now())
        ->with('payments')
        ->get()
        ->groupBy('booking_date');
    }
}
