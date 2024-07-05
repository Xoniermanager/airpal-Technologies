<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        return Language::all();
    }

    public function store(Request $request)
    {
        $data =  json_decode($request->all()['models'])[0];
        return Language::create([
            'name'=> $data->name
        ]);
         
    }
}
