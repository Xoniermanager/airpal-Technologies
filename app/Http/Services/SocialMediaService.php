<?php
namespace App\Http\Services;
use App\Models\User;
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
     public function addSocialMediaAccount($socialMediaData, $doctorId)
     {
        $socialMediaSyncData = [];
        foreach ($socialMediaData['social'] as $socialAccount) {
           if (isset($socialAccount['link']) && $socialAccount['link'] !== null) {
              $socialMediaSyncData[$socialAccount['social_media_type_id']] = [
                 'link' => $socialAccount['link']
              ];
           }
        }
        $doctor = User::find($doctorId);
        $doctor->socialMediaAccountsSync()->sync($socialMediaSyncData);
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

