<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\SocialMediaRepository;

class SocialMediaService {
    private  $socialMediaRepository;
    public function __construct(SocialMediaRepository $socialMediaRepository) {
        $this->socialMediaRepository = $socialMediaRepository;
     }

     public function all()
     {
        return $this->socialMediaRepository->all();
     } 
     public function addSocialMediaAccount($socialMediaData,$doctorId)
     {
            foreach ($socialMediaData['social'] as $socialAccount) 
            {
              $link = $socialAccount['link'];
              $accountType = $socialAccount['social_media_type_id'];
              
              // If social medial link value is not provided, so not do anything
              if(!empty($link))
              {
                 $existingRecord = $this->socialMediaRepository->findByDoctorAndAccountType($doctorId, $accountType);
                 if ($existingRecord) 
                 {
                    // If the record exists, update it
                    $this->socialMediaRepository->update([
                       'link' => $link,
                       'social_media_type_id' => $accountType
                    ], $existingRecord->id);
                 }
                 else
                 {
                    // If the record doesn't exist, create a new one
                    $this->socialMediaRepository->create([
                       'doctor_id' => $doctorId,
                       'link' => $link,
                       'social_media_type_id' => $accountType
                    ]);
                 }  
              }
        }
        return true;
     }
     public function updateSocialMediaAccount($data)    
     {
        return $this->socialMediaRepository->where('doctor_id', Auth::id())->where('id',$data['id'])->update($data);
     }
     public function getSocialMediaAccountsByDoctorId($doctorId)    
     {
      return $this->socialMediaRepository->where('doctor_id',$doctorId)->get();
     }
     public function deleteSocialMediaAccount($id)
     {
      return $this->socialMediaRepository->where('doctor_id', Auth::id())->where('id',$id)->delete();
     }
     public function getSocialMediaPaginated()
     {
         return $this->socialMediaRepository->with('country')->paginate(10)->setPath(route('admin.index.socialMedia'));
     } 
}

