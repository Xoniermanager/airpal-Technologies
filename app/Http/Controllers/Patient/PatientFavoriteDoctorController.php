<?php

namespace App\Http\Controllers\Patient;

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

    public function index()
    {
        try {
            $patientId = Auth::user()->id;
            $favoriteDoctorsList = $this->favoriteDoctorServices->getAllFavoriteDoctors($patientId)->get();
            return view('patients.favorite-doctor.favorites', ['favoriteDoctors' => $favoriteDoctorsList]);
        } catch (\Exception $e) {
            \Log::error('Error fetching favorite doctors: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
        
    }
    public function update(Request $request)
    {
        try {
            $this->favoriteDoctorServices->addFavoriteDoctor($request->all());
            return response()->json(['success' => true, 'message' => 'Favorite doctor updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to add favorite doctor.', 'error' => $e->getMessage()], 500);
        }
    }
    
    public function removeFavorite(Request $request)
    {
        try {
            if ($this->favoriteDoctorServices->getSingleFavoriteDoctors($request->all())) {
                $doctorRemoved =  $this->favoriteDoctorServices->removeFavoriteDoctor($request->all());
                $updatedFavoriteDoctorsList  =  $this->favoriteDoctorServices->getAllFavoriteDoctors(Auth::user()->id)->get();
                if ($doctorRemoved) {
                    return response()->json([
                        'success' => true,
                        "message" => "Favorite doctors removed successfully!",
                        'data'    =>  view("patients.favorite-doctor.doctor-list", [
                            'favoriteDoctors' =>  $updatedFavoriteDoctorsList
                        ])->render()
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
