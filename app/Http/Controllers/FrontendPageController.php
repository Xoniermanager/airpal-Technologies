<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendPageController extends Controller
{

    public function gdprPolicy()
    {
        return view('website.pages.gdpr-policy');
    } 

    public function cookiePolicy()
    {
        return view('website.pages.cookie_policy');
    } 

    public function insurancePolicy()
    {
        return view('website.pages.insurance_policy');
    } 
    
}
