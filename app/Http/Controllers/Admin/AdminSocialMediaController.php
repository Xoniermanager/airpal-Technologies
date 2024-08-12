<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\SocialMediaTypeService;

class AdminSocialMediaController extends Controller
{
    private $socialMediaTypeService;
    public function __construct(SocialMediaTypeService $socialMediaTypeService)
    {
        $this->socialMediaTypeService = $socialMediaTypeService;
    }
    public function index()
    {   
        $socialMediaTypes = $this->socialMediaTypeService->all();
        return view('admin.social-media.social-media-type',['socialMediaTypes'=> $socialMediaTypes]);
    }
    public function getAllSocialMediaType()
    {
        if ($this->socialMediaTypeService->all()) {
            return response()->json([
                'message' => 'Retrieve Successfully!',
                'data'   =>  $this->socialMediaTypeService->all()
            ]);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:social_media_types,name',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($this->socialMediaTypeService->add($validator->validated())) {
            return response()->json([
                'message' => 'Added Successfully!',
                'data'   =>  view('admin.social-media.social-media-type-list', [
                    'socialMediaTypes' => $this->socialMediaTypeService->all()
                ])->render()
            ]);
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'   => 'required|exists:social_media_types,id',
            'name' => 'required|string|max:255|unique:social_media_types,name,' . $request->id,
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $payload = $validator->validated();

        if ($this->socialMediaTypeService->update($payload['id'],$payload)) {
            return response()->json([
                'message' => 'Updated Successfully!',
                'data'    =>  view('admin.social-media.social-media-type-list', [
                    'socialMediaTypes' => $this->socialMediaTypeService->all()
                ])->render()
            ]);
        }
    }
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:social_media_types,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($this->socialMediaTypeService->destroy($validator->validated())) {
            return response()->json([
                'message' => 'deleted Successfully!',
                'data'   =>  view('admin.social-media.social-media-type-list', [
                    'socialMediaTypes' => $this->socialMediaTypeService->all()
                ])->render()
            ]);
        }
    }
    

}
