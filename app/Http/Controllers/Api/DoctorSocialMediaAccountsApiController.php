<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSocialMedia;
use App\Http\Services\SocialMediaService;
use App\Http\Services\SocialMediaTypeService;

class DoctorSocialMediaAccountsApiController extends Controller
{
    private $socialMediaService;
    private $socialMediaTypeService;

    public function __construct(SocialMediaService $socialMediaService,SocialMediaTypeService $socialMediaTypeService)
    {
        $this->socialMediaService = $socialMediaService;
        $this->socialMediaTypeService = $socialMediaTypeService;
    }
    public function addSocialMedia(StoreSocialMedia $request)
    {
        $payload = $request->validated();
        $doctorId = Auth::guard('api')->user()->id;

        try {
            $updatedValue = $this->socialMediaService->addSocialMediaAccount($payload,$doctorId);
            if($updatedValue)
            {
                return response()->json([
                    'message'  => 'Social media account added successfully!',
                    'status'   =>  true,
                  ]);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add social media account', 'error' => $e->getMessage()], 500);
        }
    }    
}
