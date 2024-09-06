<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\TestimonialServices;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\updateTestimonialRequest;

class TestimonialController extends Controller
{
    private $testimonialServices;
    public function __construct(TestimonialServices $testimonialServices)
    {
        $this->testimonialServices = $testimonialServices;
    }
    public function index()
    {

        $testimonialList = $this->testimonialServices->testimonialList();
        return view('admin.generals.testimonials.index',['testimonialList' => $testimonialList]);
    }
    public function getTestimonials()
    {
        return view('admin.generals.testimonials.list');
    }
    public function showTestimonialForm()
    {
        return view('admin.generals.testimonials.add');
    }
    public function editTestimonialForm($id)
    {
        $testimonial = $this->testimonialServices->getTestimonial($id);
        return view('admin.generals.testimonials.edit',['testimonial'=>$testimonial]);
    }
    public function saveTestimonial(StoreTestimonialRequest $storeTestimonialRequest)
    {
        $testimonialDetails = $storeTestimonialRequest->validated();
        $createdDetails     = $this->testimonialServices->saveTestimonial($testimonialDetails);
        if ($createdDetails) {
            return response()->json([
                "success"  =>  true,
                'message'  =>  'Saved Successfully!',
                'data'     =>  $createdDetails
            ]);
        } else {
            return response()->json([
                "success" =>   false,
                'message' =>  'Saved Successfully!',
                'data'    =>  $createdDetails
            ]);
        }
    }
    public function updateTestimonial(updateTestimonialRequest $updateTestimonialRequest ,$id)
    {
        $testimonialDetails = $updateTestimonialRequest->validated();
        $createdDetails     = $this->testimonialServices->updateTestimonial($testimonialDetails,$id);
        if ($createdDetails) {
            return response()->json([
                "success"  =>  true,
                'message'  =>  'Saved Successfully!',
                'data'     =>  $createdDetails
            ]);
        } else {
            return response()->json([
                "success" =>   false,
                'message' =>  'Something went wrong',
                'data'    =>  ''
            ]);
        }
    }
    public function deleteTestimonial($id)
    {
        $createdDetails     = $this->testimonialServices->deleteTestimonial($id);
        if ($createdDetails) {
            return response()->json([
                "success"  =>  true,
                'message'  =>  'Deleted Successfully!',
                'data'     =>  $createdDetails
            ]);
        } else {
            return response()->json([
                "success" =>   false,
                'message' =>  'Something went wrong',
                'data'    =>  ''
            ]);
        }
    }
}
