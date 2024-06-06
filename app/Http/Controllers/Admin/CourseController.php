<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
          return Course::all();
    }

    public function store(Request $request)
    {
        $data =  json_decode($request->all()['models'])[0];
        Course::create([
            'name'=> $data->name
        ]);
        return Course::all();
    }
}
