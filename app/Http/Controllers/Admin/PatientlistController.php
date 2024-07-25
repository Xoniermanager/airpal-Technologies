<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientListController extends Controller
{
    //
    
public function patientList()
{
  return view('admin.patient-list');
  
  
}
}
