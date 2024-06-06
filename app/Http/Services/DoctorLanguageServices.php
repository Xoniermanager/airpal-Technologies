<?php
namespace App\Http\Services;
use App\Models\State;
use App\Models\Country;
use App\Http\Repositories\DoctorLanguageRepository;

class DoctorLanguageServices
 {
    private  $doctorLanguageRepository;
    public function __construct(DoctorLanguageRepository $doctorLanguageRepository) {
        $this->doctorLanguageRepository = $doctorLanguageRepository;
     }
     public function addDoctorLanguage($userId , $languageIds)    
     {
        foreach ($languageIds as  $languageId) {
            $languageData = [
                'user_id' => $userId,
                'language_id' => $languageId,
            ];
           return $this->doctorLanguageRepository->create($languageData);
        }
     }
}




?>