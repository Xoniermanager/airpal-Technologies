<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
   
        return view('admin.pages.home');
    }  
    public function saveBannerDetail()
    {
        dd('hello');

    }
}
