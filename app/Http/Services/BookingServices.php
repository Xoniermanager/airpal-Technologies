<?php
namespace App\Http\Services;
use App\Jobs\SendOtpJob;
use App\Jobs\BookedSlotMailJob;
use App\Http\Repositories\bookingRepository;

class BookingServices {
    private $bookingRepository;
    public function __construct(BookingRepository $bookingRepository) {
        $this->bookingRepository = $bookingRepository;
     }
     public function store($data){
  
        $slot = $data->booking_slot_time;
        // Split the string and remove "AM" or "PM"
         list($start_time, $end_time) = array_map(function($time) {
             return str_replace(['AM', 'PM'], '', $time);
         }, explode(' - ', $slot));
        
         $payload = [
            'doctor_id'  => $data->doctor_id,
            'patient_id' => $data->patient_id,
            'booking_date'   =>  $data->booking_date,
            'slot_start_time'=>  $start_time,
            'slot_end_time'  =>  $end_time,
            'attachment' =>  $data->attachment ?? '',
            'insurance'  =>  $data->insurance,
            'note' => $data->description
         ];
        $bookedSlot  =  $this->bookingRepository->create($payload);
        if($bookedSlot)
        {
            BookedSlotMailJob::dispatch($bookedSlot);
            return redirect()->route('success.index')->with([
                'booking_date' => $data->booking_date,
                'bookingSlotTime' => $data->booking_slot_time,
                'doctorId' => $data->doctor_id,
    
            ]);
    

            
        }
     }
     public function update($data , $id){
      return $this->bookingRepository->find($id)->update($data);

     }
     public function destroy($id){
        return $this->bookingRepository->find($id)->delete();
     }
     public function getPaginateData(){
      return $this->bookingRepository->paginate(10)->setPath(route('admin.index.bookingServices'));
     }
     public function all(){
      return $this->bookingRepository->all();
     }
     public function slotDetails($data)
     {
        return $this->bookingRepository
            ->where('doctor_id',$data['doctor_id'])
            ->where('booking_date',$data['date']);
     }
     public function doctorBookings($id)
     {
        return $this->bookingRepository
            ->where('doctor_id',$id);
     }

}



