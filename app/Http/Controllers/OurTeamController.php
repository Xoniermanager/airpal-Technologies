<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OurTeamServices;
use App\Http\Requests\StoreOurTeamRequest;
use App\Http\Requests\UpdateOurTeamRequest;

class OurTeamController extends Controller
{
    private $ourTeamServices;

    public function __construct(OurTeamServices $ourTeamServices)
    {
        $this->ourTeamServices = $ourTeamServices;
    }
    public function index()
    {
        $ourTeamList = $this->ourTeamServices->all();
        return view('admin.generals.our-teams.index',['ourTeamList' => $ourTeamList]);
    }

    public function showOurTeamForm()
    {
        return view('admin.generals.our-teams.add');
    }

    public function saveOurTeam(StoreOurTeamRequest $storeOurTeamRequest)
    {
      $ourTeamPayload  = $storeOurTeamRequest->validated();
    
      $createdDetails     = $this->ourTeamServices->saveOurTeam($ourTeamPayload);
      if ($createdDetails) {
          return response()->json([
              "success"  =>  true,
              'message'  =>  'Our Team Saved Successfully!',
              'data'     =>  $createdDetails
          ]);
      } else {
          return response()->json([
              "success" =>   false,
              'message' =>  'Something went wrong',
              'data'    =>  ''
          ]);
      }
    }

    public function editOurTeamForm($id)
    {
        $ourTeam = $this->ourTeamServices->getOurTeamById($id);
        return view('admin.generals.our-teams.edit',['ourTeam' => $ourTeam ]);
    }

    public function updateOurTeam(UpdateOurTeamRequest $updateOurTeamRequest)
    {
        $ourTeamDetails = $updateOurTeamRequest->validated();

        $createdDetails     = $this->ourTeamServices->updateOurTeam($ourTeamDetails, $ourTeamDetails['id']);
        if ($createdDetails) {
            return response()->json([
                "success"  =>  true,
                'message'  =>  'ourTeam update Successfully!',
                'data'     =>  $createdDetails
            ]);
        } else {
            return response()->json([
                "success" =>   false,
                'message' =>  'Something went wrong',
                'data'    =>  ''
            ]);
        }
    }
}
