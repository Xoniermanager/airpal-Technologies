<?php

namespace App\Http\Controllers\Api\Patient;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchDoctorRequest;

class DoctorFilterController extends Controller
{

  private $user_services;

  public function __construct(UserServices $user_services)
  {
    $this->user_services = $user_services;
  }

  public function doctorSearch(SearchDoctorRequest $request)
  {
    try {
      $searchedItems = $this->user_services->searchInDoctors($request->validated());
      if ($searchedItems) {
        return response()->json([
          "status"  => "success",
          "message" => "searching ...",
          "data"    => $searchedItems['data'],
          "doctorsCount"    => $searchedItems['doctorsCount']
        ]);
      }
    } catch (\Throwable $th) {
      return response()->json([
        'success' => false,
        'message' => $th->getMessage()
      ], 500);
    }
  }

  public function getDoctorDetailsById($id)
  {
    try {
      $getAllDetails = $this->user_services->getDoctorDataById($id);
      if ($getAllDetails) {
        return response()->json([
          "status"  => true,
          "data"    => $getAllDetails
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
