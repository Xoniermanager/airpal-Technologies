<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class AddressController extends Controller
{
    
    public function add_country(Request $request){
        $country = new Country();
        $country->name = $request->name;
        $country->name = $request->status;
        $country->save();
        return true;
    }

    public function add_state(Request $request,$id){
         $country = Country::find($id);
         $state = new State();
         $state->name = $request->name;
         $state->name = $request->status;
         $country->states()->save($state);
         return true;
    }

    public function get_state($id){
       $state = Country::find($id)->state;
       return $state;
    }

    public function get_country($id){
        $country = State::find($id)->country;
        return $country;
    }

    public function update_state(Request $request,$id){
        $state = State::find($id);
        $state->name = $request->name;
        $state->name = $request->status;
        $state->save();
        return true;
    }

    public function update_country(Request $request , $id){
        $country = Country::find($id);
        $country->name = $request->name;
        $country->name = $request->status;
        $country->save();
        return true;
    }

    public function delete_state(Request $request , $id){
        $state = State::find($id);
        $state->delete();
        return true;
    }
}
