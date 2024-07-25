<?php

namespace App\Http\Controllers\Api\Patient;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;

class DoctorFilterController extends Controller
{

  private $user_services;

  public function __construct(UserServices $user_services)
  {
    $this->user_services = $user_services;
  }

  public function getAllDoctorFilters()
  {
    // Call methof getAllDoctorFilters();  from Doctor Service file
  }

  public function doctorSearch(Request $request)
  {
    try {
      $searchedItems = $this->user_services->searchInDoctors($request->all());
      if ($searchedItems) {
        return response()->json([
          "status"  => "success",
          "message" => "searching ...",
          "data"    => $searchedItems
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
