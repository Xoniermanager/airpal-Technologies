<?php

namespace App\Http\Controllers\Api\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\FavoriteDoctorServices;

class PatientFavoriteDoctorController extends Controller
{
    private $favoriteDoctorServices;
    public function __construct(FavoriteDoctorServices $favoriteDoctorServices)
    {
        $this->favoriteDoctorServices = $favoriteDoctorServices;
    }
    public function getFavoriteDoctors()
    {

        try {
            $doctors =  $this->favoriteDoctorServices->getAllFavoriteDoctors(Auth::guard('api')->user()->id)->get();
            if ($doctors) {
                return response()->json([
                    "status" => true,
                    "message"  => "Favorite Doctors Retrieved successfully",
                    "data"    => $doctors
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function addFavorite(Request $request)
    {
        try {
            $doctorAdded =  $this->favoriteDoctorServices->addFavoriteDoctor($request->all());
            if ($doctorAdded) {
                return response()->json([
                    "status"  => true,
                    "message" => "Favorite doctors added successfully!",
                    "data"    => $doctorAdded
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function removeFavorite(Request $request)
    {
        try {
            if ($this->favoriteDoctorServices->getSingleFavoriteDoctors($request->all())) {
                $doctorRemoved =  $this->favoriteDoctorServices->removeFavoriteDoctor($request->all());
                if ($doctorRemoved) {
                    return response()->json([
                        "status"  => true,
                        "message" => "Favorite doctors removed successfully!",
                        "data"    => $doctorRemoved
                    ]);
                }
            } else {
                return response()->json([
                    "status"  => false,
                    "message" => "Record not found!",
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
