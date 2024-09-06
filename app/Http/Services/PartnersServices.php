<?php

namespace App\Http\Services;
use App\Http\Repositories\PartnersRepository;


class PartnersServices
{
    private  $partnerRepository;

    public function __construct(PartnersRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }
    public function partnerList()
    {

        return  $this->partnerRepository->paginate();
    }
    public function getPartner($id)
    {
        return $this->partnerRepository->where('id', $id)->first();
    }

    public function savePartner($data)
    {
        if (isset($data['image']) && !empty($data['image'])) {
            $data['image'] = uploadingImageorFile($data['image'], 'partners', $data['image']);
        }
        return  $this->partnerRepository->create($data);
    }
    public function updatePartner($data, $id)
    {
        $existingPartner = $this->partnerRepository->where('id', $id)->first();

        if (isset($data['image']) && !empty($data['image'])) {
            if ($existingPartner->image  != null) {
                unlinkFileOrImage($existingPartner->getRawOriginal('image'));
            }
            $data['image'] = uploadingImageorFile($data['image'], 'partner', $data['title']);
        }
        return  $this->partnerRepository->find($id)->update($data);
    }
    public function deletePartner($id)
    {
        return  $this->partnerRepository->find($id)->delete();
    }
}
