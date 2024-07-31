<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSocialMedia;
use App\Http\Services\SocialMediaService;

class DoctorSocialMediaAccountsController extends Controller
{
    private $socialMediaService;
    public function __construct(SocialMediaService $socialMediaService)
    {
        $this->socialMediaService = $socialMediaService;
    }
    public function doctorSocial()
    {
        $socialMediaAccounts  = $this->socialMediaService->getSocialMediaAccountsByDoctorId(Auth::id());
        return view('doctor.social-media-accounts.doctor-social',['socialMediaAccounts'=> $socialMediaAccounts]);
    }
    public function addSocialMedia(StoreSocialMedia $storeSocialMedia)
    {
        try {
            $data = $storeSocialMedia->validated();
            $this->socialMediaService->addSocialMediaAccount($data);
            $socialMediaAccounts = $this->socialMediaService->getSocialMediaAccountsByDoctorId(Auth::id());
            return response()->json([
                'message'  => 'Social media account added successfully!',
                'data'     =>  view('doctor.social-media-accounts.list', [
                  'socialMediaAccounts' => $socialMediaAccounts
                ])->render()
              ]);
            
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add social media account', 'error' => $e->getMessage()], 500);
        }
    }

    public function deleteSocialMediaAccount(Request $request)
    {
        try {
            $deletedAccount = $this->socialMediaService->deleteSocialMediaAccount($request->id);
            $socialMediaAccounts  = $this->socialMediaService->getSocialMediaAccountsByDoctorId(Auth::id());
            return response()->json([
                'message'  => 'Social media account delete successfully!',
                'data'     =>  view('doctor.social-media-accounts.list', [
                  'socialMediaAccounts' => $socialMediaAccounts
                ])->render()
              ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add social media account', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateSocialMediaAccount(StoreSocialMedia $request)
    {
        try {
            $data = $request->except('_token');
            $updateAccount = $this->socialMediaService->updateSocialMediaAccount($data);
            $socialMediaAccounts  = $this->socialMediaService->getSocialMediaAccountsByDoctorId(Auth::id());
            if($updateAccount)
            {
                return response()->json([
                    'message'  => 'Social media account delete successfully!',
                    'data'     =>  view('doctor.social-media-accounts.list', [
                      'socialMediaAccounts' => $socialMediaAccounts
                    ])->render()
                  ]);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add social media account', 'error' => $e->getMessage()], 500);
        }
    }
    
}
