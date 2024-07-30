<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Jobs\SendOtpJob;
use App\Models\BookingSlots;
use App\Jobs\BookedSlotMailJob;
use Illuminate\Support\Facades\Crypt;
use App\Jobs\DoctorAppointmentQueryMailJob;
use App\Http\Repositories\BookingRepository;

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

      if (isset($data["image"]) && !empty($data['image'])) {
         $image = $data["image"];
         if ($image instanceof \Illuminate\Http\UploadedFile) {
            $filename = 'appointment_booking' . time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('appointments_file');
            $image->move($destinationPath, $filename);
         }
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
         'image' => $filename ?? '',
      ];
      $bookedSlot  =  $this->bookingRepository->create($payload);
      if ($bookedSlot) {
         BookedSlotMailJob::dispatch($bookedSlot);

         $encryptedBookingId = Crypt::encryptString($bookedSlot->id);
         $base64Encoded = base64_encode($encryptedBookingId);
         $urlSafeEncoded = urlencode($base64Encoded);
         $url = route('doctor.disease-details', ['booking_id' => $urlSafeEncoded]);

         // $encryptedBookingId = Crypt::encryptString($bookedSlot->id);
         // $url = route('doctor.disease-details', ['booking_id' => $encryptedBookingId]);
         $mailDataAndLink = [
            'link' => $url
         ];
         DoctorAppointmentQueryMailJob::dispatch($mailDataAndLink);

         return redirect()->route('success.index')->with([
            'booking_date' => $data->booking_date,
            'bookingSlotTime' => $data->booking_slot_time,
            'doctorId' => $data->doctor_id,
         ]);
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
      return $this->bookingRepository->paginate(10)->setPath(route('admin.index.bookingServices'));
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
   public function doctorBookings($id)
   {
      return $this->bookingRepository->where('doctor_id', $id);
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
      return $this->bookingRepository->where('id', $id)->with('patient');
   }

   public function doctorUpcomingBookings($id)
   {
      return $this->doctorBookings($id)->where('booking_date', '>', Carbon::now()->toDateString());
   }
   public function patientUpcomingBookings($id)
   {
      return $this->patientBookings($id)->where('booking_date', '>', Carbon::now()->toDateString())->with('user');
   }
   public function searchDoctorAppointments($filterParams)
   {
      return  $this->bookingRepository->searchDoctorAppointments($filterParams);
   }

   public function doctorAppointmentSearch($searchKey, $doctorId)
   {
      return $this->bookingRepository->where('doctor_id', 2)
         ->whereHas('patient', function ($query) use ($searchKey) {
            $query->where('first_name', 'like', "%{$searchKey}%");
         })->get();
   }

   public function requestedAppointment($id)
   {
      return $this->doctorBookings($id)->where('status', 'requested');
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
      return $this->bookingRepository->find($id)->update(['status' => $status]);
   }
}
