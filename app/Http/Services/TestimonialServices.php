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
    public function all()
    {

        return  $this->testimonialRepository->get();
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
        // Retrieve the existing testimonial
        $existingTestimonial = $this->testimonialRepository->where('id', $id)->first();
    
        // Check if the testimonial exists
        if (!$existingTestimonial) {
            throw new \Exception("Testimonial with ID $id not found.");
        }
    
        // Remove 'id' from data if present
        unset($data['id']);
    
        // Check if there is an image in the data
        if (isset($data['image']) && !empty($data['image'])) {
            // Check if there's an existing image and remove it
            if ($existingTestimonial->image != null &&  !$existingTestimonial->image) {
                // Make sure the function handles the case where the file might not exist
                unlinkFileOrImage($existingTestimonial->getRawOriginal('image'));
            }
    
            // Upload the new image
            $data['image'] = uploadingImageorFile($data['image'], 'testimonial', $data['title']);
        }
    
        // Update the testimonial
        return $this->testimonialRepository->where('id', $id)->update($data);
    }
    
    public function deleteTestimonial($id)
    {
        return  $this->testimonialRepository->find($id)->delete();
    }
}
