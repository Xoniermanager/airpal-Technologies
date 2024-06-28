<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\UserServices;
use App\Models\Slots;
use App\Models\DayOfWeek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlotRequest;
use App\Http\Services\DoctorSlotServices;

class SlotsController extends Controller
{

    private $doctorSlotServices;
    private $userServices;

    public function __construct(DoctorSlotServices $doctorSlotServices,UserServices $userServices){
        $this->doctorSlotServices = $doctorSlotServices;
        $this->userServices = $userServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allDoctorList  = $this->userServices->all();
        $weekDays       = DayOfWeek::all();
        $allSlotDetails = $this->doctorSlotServices->getSlotsPaginated();
        return view('admin.doctor_slots.index',['weekDays'=>$weekDays,'allSlotDetails'=>$allSlotDetails , 'doctors' => $allDoctorList]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlotRequest $request)
    {
        if ($this->doctorSlotServices->addSlot($request->all())) {
            return response()->json([
                'message' => 'success',
                'data'   =>  view('admin.doctor_slots.slot-list', [
                  'allSlotDetails' => $this->doctorSlotServices->getSlotsPaginated()
                ])->render()
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSlotRequest $request)
    {
        if ($this->doctorSlotServices->updateSlot($request->all())) {
            return response()->json([
                'message' => 'success',
                'data'   =>  view('admin.doctor_slots.slot-list', [
                  'allSlotDetails' => $this->doctorSlotServices->getSlotsPaginated()
                ])->render()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($this->doctorSlotServices->deleteSlot($request->id)) {
            return response()->json([
                'message' => 'update Successfully!',
                'data'   =>  view('admin.doctor_slots.slot-list', [
                    'allSlotDetails' => $this->doctorSlotServices->getSlotsPaginated()
                  ])->render()
            ]);
        }
    }

    public function getWeekDays()
    {
       return DayOfWeek::all();
    }
}
