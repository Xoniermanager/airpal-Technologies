<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountsDetailsController extends Controller
{
    private $userServices;
    public function __construct(UserServices $userServices){
        $this->userServices = $userServices;
    }
    public function doctorAccounts()
    {
    $doctorDetails = $this->userServices->getDoctorDataById(auth::id());
      return view('doctor.doctor-accounts',['doctorDetails' => $doctorDetails ]);
    }
}
