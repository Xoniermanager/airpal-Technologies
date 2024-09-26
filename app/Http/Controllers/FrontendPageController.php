<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;

class FrontendPageController extends Controller
{
    private $user_services;

  
    public function __construct(UserServices $user_services) {
      $this->user_services = $user_services;
    }

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
    
    public function globalSearchHeader(Request $request)
    {
      $searchedItems = $this->user_services->globalSearch($request->all());
      // dd(count($searchedItems));
      $output = '<ul class="dropdown-menu" style="display:block; left: 17%; width: 82%;">';
      if (count($searchedItems) == 0) 
      {
        $output .= '
        <li style="padding:10px; display: flex; align-items: center;">
            <div>
                <p style="margin:0; font-size:12px; color:gray;">No Result Found</p>
            </div>
        </li>';
      }
      foreach ($searchedItems as $item) {
          $output .= '
            <li style="padding:10px; border-bottom:1px solid #ddd; display: flex; align-items: center;">
                <a href="' . route('frontend.doctor.profile', ['user' => getEncryptId($item->id)]) . '" style="display: flex; align-items: center; text-decoration: none;">
                    <img src="' . $item->image_url . '" alt="' . $item->first_name . '" style="width:50px; height:50px; border-radius:50%; margin-right:10px;">
                    <div>
                        <span style="font-weight:bold; color:black;">' . $item->first_name . '</span>
                        <p style="margin:0; font-size:12px; color:gray;">Education: ' . $item->doctorEducation() . '</p>
                        <p style="margin:0; font-size:12px; color:gray;">Specialty: ' . formatDoctorSpecializations($item) . '</p>
                    </div>
                </a>
            </li>';
      }
      $output .= '</ul>';
      return $output;
    }
    
}
