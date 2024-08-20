<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Http\Services\StateServices;
use App\Http\Requests\{StoreStateRequest,UpdateStateRequest};

use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    private $state_service;

    public function __construct(StateServices $state_service){
        $this->state_service = $state_service;
    }

    public function index(Request $request){
        $allStates = State::with("country")->paginate(10);

       $countries = Country::all();
       return view("admin.state.index", compact("countries","allStates"));
    }

    public function store(StoreStateRequest $storeStateRequest)
    { 
        if ($this->state_service->addState($storeStateRequest->validated())) {
            return response()->json([
                'message' => 'Add Successfully!',
                'data'   =>  view('admin.state.state-list', [
                  'allStates' => $this->state_service->getStatesPaginated()
                ])->render()
            ]);
        }

     }
     public function update(State $state, UpdateStateRequest $updateStateRequest)
     {
        
        if ($this->state_service->updateCountry($updateStateRequest->validated(),$updateStateRequest->state_id)) 
        {
            return response()->json([
                'message' => 'Add Successfully!',
                'data'   =>  view('admin.state.state-list', [
                  'allStates' => $this->state_service->getStatesPaginated()
                ])->render()
            ]);
        }
     }

     public function deleteState(State $state)
     {
        if ($this->state_service->deleteState($state->id)) {
            return response()->json([
                'message' => 'Deleted Successfully!',
                'data'   =>  view('admin.state.state-list', [
                  'allStates' => $this->state_service->getStatesPaginated()
                ])->render()
            ]);
        }

     }

     public function getStateByCountryID(Request $request)
     {
        $data = $request->all();
        $states  = $this->state_service->getByCountryID($data['country_id']);
            return response()->json([
            'message' => 'states successfully retrieved',
            'data' => $states
        ]);
    }
        

}
