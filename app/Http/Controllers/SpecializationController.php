<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\SpecializationServices;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\Validator;

class SpecializationController extends Controller
{
    private  $specialiation_services;
    public function __construct(SpecializationServices $specialiation_services) {
        $this->specialiation_services = $specialiation_services;
     }
    public function add_specialization(Request $request){
        $validator = Validator::make($request->all(), [
          'name'        => 'required',
          'description' => 'required',
          'status'      => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $response = $this->specialiation_services->save($request->all);
    }
    public function edit_specialization(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'description' => 'required',
            'status'      => 'required',
          ]);
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
          }

          $response = $this->specialiation_services->edit($request->all,$id);

        $specailization = Specialization::find($id);
        $specailization->name = $request->name;
        $specailization->description = $request->description;
        $specailization->status = $request->status;
        $specailization->save();
        return true;
    }

}
