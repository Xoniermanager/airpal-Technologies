<?php

namespace App\Http\Services;
use App\Http\Repositories\SocialMediaTypeRepository;

class SocialMediaTypeService
{
    private  $socialMediaTypeRepository;
    public function __construct(SocialMediaTypeRepository $socialMediaTypeRepository)
    {
        $this->socialMediaTypeRepository = $socialMediaTypeRepository;
    }

    public function all()
    {
        return $this->socialMediaTypeRepository->paginate(10);
    }

    public function add($data)
    {
        return $this->socialMediaTypeRepository->create($data);
    }

    public function update($id,$data)
    {
        return $this->socialMediaTypeRepository->where('id',$id)->update($data);
    }

    public function destroy($id)
    {
        return $this->socialMediaTypeRepository->where('id',$id)->delete();
    }

}
