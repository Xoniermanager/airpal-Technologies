<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmindoctorController extends Controller
{
    //

    public function doctors()
    {
      return view('admin.doctors.doctors');
      
    }
}
