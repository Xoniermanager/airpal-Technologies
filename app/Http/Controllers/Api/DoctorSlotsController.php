<?php

namespace App\Http\Controllers\Api;

use DateTime;
use App\Models\DayOfWeek;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\BookingServices;
use App\Http\Requests\StoreSlotRequest;
use App\Http\Services\DoctorSlotServices;

class DoctorSlotsController extends Controller
{
    private $doctorSlotServices;
    private $userServices;
    private $bookingServices;

    public function __construct(DoctorSlotServices $doctorSlotServices, UserServices $userServices, BookingServices $bookingServices)
    {
        $this->doctorSlotServices = $doctorSlotServices;
        $this->userServices = $userServices;
        $this->bookingServices = $bookingServices;
    }

    public function index(Request $request)
    {
        $allDoctorList  = $this->userServices->all();
        $weekDays       = DayOfWeek::all();
        $allSlotDetails = $this->doctorSlotServices->getSlotsPaginated();
        return view('admin.doctor_slots.index', ['weekDays' => $weekDays, 'allSlotDetails' => $allSlotDetails, 'doctors' => $allDoctorList]);
    }


    public function store(StoreSlotRequest $request)
    {
        $response =  $this->doctorSlotServices->addSlot($request->all());
        if ($response) { {
                return response()->json([
                    "status"  => "success",
                    "message" => "Doctor address details saved!",
                    "data"    => $response
                ]);
            }
        }
    }

    public function update(StoreSlotRequest $request)
    {
        $response =  $this->doctorSlotServices->updateSlot($request->all());
        if ($response) {
            return response()->json([
                "status"  => "success",
                "message" => "Doctor address details saved!",
                "data"    => $response,

            ]);
        }
    }
    public function get($id)
    {
        $response = $this->doctorSlotServices->getSlotsBySlotId($id);
        if ($response) {
            return response()->json([
                "status"  => "success",
                "message" => "Doctor slot retrieve successfully",
                "data"    => $response,

            ]);
        }
    }
    public function delete($id)
    {
        $response = $this->doctorSlotServices->deleteSlot($id);
        if ($response) {
            return response()->json([
                "status"  => "success",
                "message" => "Doctor slot retrieve successfully",
                "data"    => $response,

            ]);
        }
    }
    public function showSlotsByDoctorId($id)
    {

        $doctor     = $this->userServices->getDoctorDataById($id);
        $doctorSlot = $this->doctorSlotServices->getSlotsByDoctorId($doctor->id);
        if (isset($doctorSlot)) {
            $doctorSlot->exception_days = $doctorSlot->user->doctorExceptionDays;
            $returnedSlots  = $this->doctorSlotServices->makeSlots($doctorSlot);
        } else {
            $returnedSlots = [];
        }
        if ($returnedSlots) {
            return response()->json([
                "status"  => "success",
                "message" => "Doctor slot retrieve successfully",
                "data"    => $returnedSlots,

            ]);
        }
    }


    // public function getDoctorSlotsByDate(Request $request)
    // {
    //     $data = $request->all();
    //     $date = $data['date'];
    
    //     $doctorSlots = $this->doctorSlotServices->getSlotsByDoctorId($data['doctor_id']);
    //     $returnedSlots = $this->doctorSlotServices->makeSlots($doctorSlots);
    
    //     $gettingBookedSlots = $this->bookingServices->slotDetails($data)->get();
    
    //     $startDateTime = collect($returnedSlots)->map(function ($item, $key) {
    //         $item['date'] = $key;
    //         return $item;
    //     })->values()->first();
    
    //     $date = $date ? $date : $startDateTime['date'];
    
    //     // Filter and prepare slots data
    //     $slotsData = collect($returnedSlots)
    //         ->filter(function ($item, $key) use ($date, $startDateTime) {
    //             return $key == $date;
    //         })
    //         ->map(function ($item, $key) {
    //             $item['date'] = $key;
    //             return $item;
    //         })
    //         ->values();
    
    //     // Collect booked slots for the given date
    //     $bookedSlotTimes = $gettingBookedSlots->filter(function ($item) use ($date) {
    //         return $item['booking_date'] == $date;
    //     })->map(function ($item) {
    //         return [
    //             'start_time' => $item['slot_start_time'],
    //             'end_time' => $item['slot_end_time']
    //         ];
    //     });
    
    //     // Prepare JSON response for slots with indication of booked slots
    //     $slotsResponse = [];
    //     foreach ($slotsData as $day) {
    //         foreach ($day['slotsTime'] as $slot) {
    //             $isBooked = false;
    //             list($startTime, $endTime) = explode(' - ', $slot);
    
    //             $startDateTime = DateTime::createFromFormat('H:iA', $startTime);
    //             $endDateTime = DateTime::createFromFormat('H:iA', $endTime);
    
    //             if (!$startDateTime || !$endDateTime) {
    //                 throw new \Exception("Failed to create DateTime object from '$startTime' or '$endTime'");
    //             }
    
    //             // Check if slot is booked
    //             foreach ($bookedSlotTimes as $bookedSlot) {
    //                 $bookedStartTime = DateTime::createFromFormat('H:i:s', $bookedSlot['start_time']);
    //                 $bookedEndTime = DateTime::createFromFormat('H:i:s', $bookedSlot['end_time']);
    
    //                 // Check for overlapping times
    //                 if ($startDateTime < $bookedEndTime && $endDateTime > $bookedStartTime) {
    //                     $isBooked = true;
    //                     break;
    //                 }
    //             }
    
    //             $slotsResponse[] = [
    //                 'slot' => $slot,
    //                 'is_booked' => $isBooked
    //             ];
    //         }
    //     }
    
    //     return response()->json(['slots' => $slotsResponse]);
    // }
    

    public function getDoctorSlotsByDate(Request $request)
    {
        $data = $request->all();
        $date = $data['date'];

        $doctorSlots = $this->doctorSlotServices->getSlotsByDoctorId($data['doctor_id']);
        $returnedSlots = $this->doctorSlotServices->makeSlots($doctorSlots);

        $gettingBookedSlots = $this->bookingServices->slotDetails($data)->get();

        $startDateTime = collect($returnedSlots)->map(function ($item, $key) {
            $item['date'] = $key;
            return $item;
        })->values()->first();

        $date = $date ? $date : $startDateTime['date'];

        // Filter and prepare slots data
        $slotsData = collect($returnedSlots)
            ->filter(function ($item, $key) use ($date, $startDateTime) {
                return $key == $date;
            })
            ->map(function ($item, $key) {
                $item['date'] = $key;
                return $item;
            })
            ->values();

        // Collect booked slots for the given date
        $bookedSlotTimes = $gettingBookedSlots->filter(function ($item) use ($date) {
            return $item['booking_date'] == $date;
        })->map(function ($item) {
            return [
                'start_time' => $item['slot_start_time'],
                'end_time' => $item['slot_end_time']
            ];
        });
  

        // Prepare HTML for slots with indication of booked slots
        $html = '<div>';
        foreach ($slotsData as $day) {
            foreach ($day['slotsTime'] as $slot) {
                $isBooked = false;
                list($startTime, $endTime) = explode(' - ', $slot);


                $startDateTime = DateTime::createFromFormat('H:iA', $startTime);
                $endDateTime = DateTime::createFromFormat('H:iA', $endTime);

                if (!$startDateTime || !$endDateTime) {
                    throw new \Exception("Failed to create DateTime object from '$startTime' or '$endTime'");
                }

                // Check if slot is booked
                foreach ($bookedSlotTimes as $bookedSlot) {
                    $bookedStartTime = DateTime::createFromFormat('H:i:s', $bookedSlot['start_time']);
                    $bookedEndTime = DateTime::createFromFormat('H:i:s', $bookedSlot['end_time']);

                    // Check for overlapping times
                    if ($startDateTime < $bookedEndTime && $endDateTime > $bookedStartTime) {
                        $isBooked = true;
                        break;
                    }
                }

                // Add booked class if the slot is booked
                $slotClass = $isBooked ? ' booked' : '';

                $html .= '<div class="slot-group">';
                $html .= '<button class="btn btn-outline-primary mb-3 w-100' . $slotClass;
                $html .= $isBooked ? ' disabled' : '';
                $html .= '" onclick="splitButton(this)">' . htmlspecialchars($slot) . '</button>';
                $html .= '<div class="additional-buttons hidden mb-2">';
                $html .= '<button id="button1" onclick="showContent(\'myDIV\')">' . htmlspecialchars(explode(' - ', $slot)[0]) . '</button>';
                $html .= '<button id="button2" onclick="showContent(\'content2\', \'' . htmlspecialchars($slot) . '\', \'' . $date . '\', \'' . $data['doctor_id'] . '\')">Next</button>';
                $html .= '</div>';
                $html .= '</div>';
            }
        }

        $html .= '</div>';

        return response()->json(['html' => $html]);
    }
}
