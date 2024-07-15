<?php

namespace App\Http\Controllers\Api;

use App\Models\DayOfWeek;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlotRequest;
use App\Http\Services\DoctorSlotServices;

class DoctorSlotsController extends Controller
{
    private $doctorSlotServices;
    private $userServices;

    public function __construct(DoctorSlotServices $doctorSlotServices, UserServices $userServices){
        $this->doctorSlotServices = $doctorSlotServices;
        $this->userServices = $userServices;
    }

    public function index(Request $request)
    {
        $allDoctorList  = $this->userServices->all();
        $weekDays       = DayOfWeek::all();
        $allSlotDetails = $this->doctorSlotServices->getSlotsPaginated();
        return view('admin.doctor_slots.index',['weekDays'=>$weekDays,'allSlotDetails'=>$allSlotDetails , 'doctors' => $allDoctorList]);
    }


    public function store(StoreSlotRequest $request)
    {
       $response =  $this->doctorSlotServices->addSlot($request->all());
        if ($response) {
            {
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

}
