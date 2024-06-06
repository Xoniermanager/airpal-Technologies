<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function index()
    {
       return  Hospital::all();
    }
    public function store(Request $request)
    {
        $data =  json_decode($request->all()['models'])[0];
        Hospital::create([
            'name'=> $data->name
        ]);
        return Hospital::all();
    }
}
