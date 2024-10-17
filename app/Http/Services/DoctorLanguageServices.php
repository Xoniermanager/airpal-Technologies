<?php
namespace App\Http\Services;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Http\Repositories\DoctorLanguageRepository;

class DoctorLanguageServices
 {
    private  $doctorLanguageRepository;
    public function __construct(DoctorLanguageRepository $doctorLanguageRepository) {
        $this->doctorLanguageRepository = $doctorLanguageRepository;
     }
   //   public function addDoctorLanguage($userId , $languageIds)    
   //   {
   //      foreach ($languageIds as  $languageId) {
   //          $languageData = [
   //              'user_id' => $userId,
   //              'language_id' => $languageId,
   //          ];
   //         $this->doctorLanguageRepository->create($languageData);
   //      }
   //      return true;
   //   }


      // public function addOrUpdateDoctorLanguage($userId, $languages) {
         
      //     // Assuming $languages is an array of language data
      //     foreach ($languages as $language) {
      //       $this->doctorLanguageRepository->updateOrCreate(
      //             ['user_id' => $userId, 'language_id' => $language],
      //             ['user_id' => $userId, 'language_id' => $language]
      //         );
      //     }
      //     return true;
      // }
  
      public function addOrUpdateDoctorLanguage($userId, $languages) {

        $userDetails = User::find($userId);
        $userDetails->language()->sync($languages);
        return true;
     }
     
  
}