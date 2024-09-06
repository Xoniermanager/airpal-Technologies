<?php

namespace App\Http\Services;

use App\Http\Repositories\TestimonialRepository;


class TestimonialServices
{
    private  $testimonialRepository;

    public function __construct(TestimonialRepository $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }
    public function testimonialList()
    {

        return  $this->testimonialRepository->paginate();
    }
    public function getTestimonial($id)
    {
        return $this->testimonialRepository->where('id', $id)->first();
    }

    public function saveTestimonial($data)
    {
        if (isset($data['image']) && !empty($data['image'])) {
            $data['image'] = uploadingImageorFile($data['image'], 'testimonial', $data['title']);
        }
        return  $this->testimonialRepository->create($data);
    }
    public function updateTestimonial($data, $id)
    {
        $existingTestimonial =$this->testimonialRepository->where('id', $id)->first();

        if (isset($data['image']) && !empty($data['image'])) {
            if($existingTestimonial->image  != null)
            {
                unlinkFileOrImage($existingTestimonial->getRawOriginal('image'));   
            }
            $data['image'] = uploadingImageorFile($data['image'], 'testimonial', $data['title']);
        }
        return  $this->testimonialRepository->find($id)->update($data);
    }
    public function deleteTestimonial($id)
    {
        return  $this->testimonialRepository->find($id)->delete();
    }
}
