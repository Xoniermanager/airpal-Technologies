<?php

namespace App\Http\Controllers\API\Patient;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Http\Services\UserServices;
use App\Models\Service;

class AllListingController extends Controller
{
    private $userServices;
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function listing()
    {
        try {

            $doctors    = $this->userServices->all();
            $specialty  = Specialization::all();
            $services   = Service::all();
            $languages  = Language::all();
            $experience = [
                [
                    'id' => '1',
                    'year' => '1-5 Years'
                ],
                [
                    'id' =>  '2',
                    'year'  => '5-10 Years'
                ]
            ];

            $gender     = [
                [
                    'id' => '1',
                    'key' => 'Male'
                ],
                [
                    'id' => '2',
                    'key' =>  'Female'
                ]
            ];

            $listing = [
                'specialties' => $specialty,
                'services'    => $services,
                'languages'   => $languages,
                'experience'  => $experience,
                'gender'      => $gender,
                'doctors'     => $doctors
            ];
            return response()->json([
                "status"   => "success",
                "message"  => "Doctor award details saved!",
                "data"     => $listing
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
