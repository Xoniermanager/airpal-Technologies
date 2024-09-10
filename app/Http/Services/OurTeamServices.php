<?php

namespace App\Http\Services;

use App\Http\Repositories\OurTeamRepository;


class OurTeamServices
{
    private  $ourTeamRepository;

    public function __construct(OurTeamRepository $ourTeamRepository)
    {
        $this->ourTeamRepository = $ourTeamRepository;
    }
    public function all()
    {
        return  $this->ourTeamRepository->all();
    }
    public function saveOurTeam($data)
    {
        if (isset($data['image']) && !empty($data['image'])) {
            $data['image'] = uploadingImageorFile($data['image'], 'our_teams', $data['name']);
        }
        return  $this->ourTeamRepository->create($data);
    }

    public function getOurTeamById($id)
    {
        return $this->ourTeamRepository->where('id',$id)->first();
    }
    public function updateOurTeam($data, $id)
    {
        // Retrieve the existing ourTeam
        $existingOurTeam = $this->ourTeamRepository->where('id', $id)->first();
        if (!$existingOurTeam) {
            throw new \Exception("ourTeam with ID $id not found.");
        }
        unset($data['id']);
        if (isset($data['image']) && !empty($data['image'])) {

            if ($existingOurTeam->image != null &&  !$existingOurTeam->image) {
                unlinkFileOrImage($existingOurTeam->getRawOriginal('image'));
            }
            $data['image'] = uploadingImageorFile($data['image'], 'ourTeam', $data['name']);
        }

        return $this->ourTeamRepository->where('id', $id)->update($data);
    }
}
