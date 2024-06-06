<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CountryServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Country;
use App\Http\Requests\{StoreCountryRequest,UpdateCountryRequest};

class CountryController extends Controller
{
    private $country_service;

    public function __construct(CountryServices $country_service){
             $this->country_service = $country_service;
    }
    public function index(){
        $countries =  $this->country_service->getPaginateData();
        return view("admin.country.index",compact("countries"));
    }
    public function create(StoreCountryRequest $storeCountryRequest){
        if ($this->country_service->addCountry($storeCountryRequest->validated())) {
            return response()->json([
                'message' => 'Added Successfully!',
                'data'   =>  view('admin.country.country-list', [
                  'countries' =>  $this->country_service->getPaginateData()
                ])->render()
            ]);
        }
    }
    public function update(Country $country,UpdateCountryRequest $updateCountryRequest){
        // dd($updateCountryRequest->validated());
        if ($this->country_service->updateCountry($updateCountryRequest->validated(),$updateCountryRequest->country_id)) {
            return response()->json([
                'message' => 'Update Successfully!',
                'data'   =>  view('admin.country.country-list', [
                  'countries' => $this->country_service->getPaginateData()
                ])->render()
            ]);
        }
    }
    public function deleteCountry(Request $request){
        $validator = Validator::make($request->all(), [
            'id'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($this->country_service->countryDelete($request->id)) {
            return response()->json([
                'message' => 'Deleted Successfully!',
                'data'   =>  view('admin.country.country-list', [
                  'countries' =>  $this->country_service->getPaginateData()
                ])->render()
            ]);
        }
    }
}
 