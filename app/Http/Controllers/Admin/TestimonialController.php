<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.generals.testimonials.index');
    }
    public function getTestimonials()
    {
        return view('admin.generals.testimonials.list');
    }
}
