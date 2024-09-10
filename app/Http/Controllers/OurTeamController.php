<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOurTeamRequest;

class OurTeamController extends Controller
{
    public function index()
    {
        return view('admin.generals.our-teams.index');
    }

    public function showOurTeamForm()
    {
        return view('admin.generals.our-teams.add');
    }

    public function saveOurTeam(StoreOurTeamRequest $storeOurTeamRequest)
    {
      $ourTeamPayload  = $storeOurTeamRequest->validated();
      dd($ourTeamPayload );
    }
}
