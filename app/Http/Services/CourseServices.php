<?php
namespace App\Http\Services;
use App\Models\Country;
use App\Http\Repositories\CourseRepository;

class CourseServices {
    private  $course_repository;
    public function __construct(CourseRepository $course_repository) {
        $this->course_repository = $course_repository;
     }
     public function addCountry($data){
        return $this->course_repository->create($data);
     }

}

