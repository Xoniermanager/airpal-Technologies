<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Award;

class AwardController extends Controller
{
    public function index()
    {
        return Award::all();
    }
    public function store(Request $request)
    {
        $data =  json_decode($request->all()['models'])[0];
        Award::create([
            'name'=> $data->name
        ]);
        return Award::all();
    }
}
