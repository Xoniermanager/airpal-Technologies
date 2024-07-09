<?php

namespace App\Http\Services;

use App\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use App\Http\Repositories\DoctorAwardRepository;

class DoctorAwardServices
{
  private  $doctor_award_repository;
  public function __construct(DoctorAwardRepository $doctor_award_repository)
  {
    $this->doctor_award_repository = $doctor_award_repository;
  }


  public function addDoctorAward($data)
{
    $userId = $data['user_id'];

    foreach ($data['awards'] as $award) 
    {
        $payload = [
            'award_id'    => $award['name'],
            'year'        => $award['year'],
            'description' => $award['description']
        ];

        if (isset($award['certificates'])) 
        {
            $file = $award['certificates'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath, $filename);
            $payload['certificates'] = $filename;

            $imageUrl = $this->doctor_award_repository
                             ->where('user_id', $userId)
                             ->where('award_id', $award['name'])
                             ->first();
            if (isset($imageUrl->certificates)) 
            {
                $destinationPath = public_path('images/' . $imageUrl->certificates);
                if (File::exists($destinationPath)) 
                {
                    unlink($destinationPath);
                }
            }
        }

        // Check if the award entry already exists
        $existingEntry = $this->doctor_award_repository
                             ->where('id', $award['id'] ?? null)
                             ->where('user_id', $userId)
                             ->first();

        // Check for duplicates
        $duplicateEntry = $this->doctor_award_repository
                              ->where('award_id', $award['name'])
                              ->where('user_id', $userId)
                              ->where('id', '!=', $award['id'] ?? null)
                              ->first();
        if ($existingEntry) 
        {
          $this->doctor_award_repository
                             ->where('id', $award['id'])
                             ->where('user_id', $userId)->update($payload);
        } 
        else if ($duplicateEntry) 
        {
          return false;
        } 
        else 
        {
          $this->doctor_award_repository->create(array_merge($payload, [
                'user_id' => $userId
            ]));
        }
    }

    return true;
}


  // public function addDoctorAward($data)
  // {


  //   $payload = [];
  //   $userId = $data['user_id'];
  //   foreach ($data['awards'] as $award) {
  //     $payload =
  //       [
  //         'award_id'        => $award['name'],
  //         'year'            => $award['year'],
  //         'description'     => $award['description']
  //       ];

  //     if (isset($award['certificates'])) {
  //       $file = $award['certificates'];
  //       $filename = time() . '.' . $file->getClientOriginalExtension();
  //       $destinationPath = public_path('images');
  //       $file->move($destinationPath, $filename);
  //       $payload['certificates'] = $filename;

  //       $imageUrl = $this->doctor_award_repository->where('user_id', $userId)->where('award_id', $award['name'])->first();
  //       if (isset($imageUrl->certificates)) {
  //         $destinationPath = public_path('images/' . $imageUrl->certificates);
  //         if (File::exists($destinationPath)) {
  //           unlink($destinationPath);
  //         }
  //       }
  //     }
  //     // Check if the education entry already exists
  //     $existingEntry = $this->doctor_award_repository
  //       ->where('id', $award['id'] ?? null)
  //       ->where('user_id', $userId)
  //       ->first();
        
  //       // Check for duplicates
  //       $duplicateEntry = $this->doctor_award_repository
  //       ->where('award_id', $award['name'])
  //       ->where('user_id', $userId)
  //       ->first();
        
  //       if ($existingEntry) 
  //       {
  //           // Update existing entry
  //           $existingEntry->update($payload);
  //       } 
  //       else if ($duplicateEntry) 
  //       {
  //           // Handle duplicate award entry (e.g., throw an exception or return an error message)
  //           return response()->json(['error' => 'This award has already been added for this user.'], 400);
  //       } 
  //       else 
  //       {
  //           // Create new entry
  //           $this->doctor_award_repository->create(array_merge($payload, [
  //               'user_id' => $userId
  //           ]));
  //       }
  //   }

  //   return true;
  // }

  public function deleteDetails($id)
  {
    return $this->doctor_award_repository->find($id)->delete();
  }


  public function createOrUpdateAwardSingleRecord($data)
  {
        $payload = [
            'award_id'    => $data['name'],
            'year'        => $data['year'],
            'description' => $data['description']
        ];
  
        if (isset($data['certificates']) && !empty($data['certificates'])) {
            $file = $data['certificates'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath, $filename);
            $payload['certificates'] = $filename;

            // Delete the old certificate if exists
            $imageUrl = $this->doctor_award_repository
                ->where('user_id', $data['user_id'])
                ->where('course_id', $data['course'])
                ->first();
            if (isset($imageUrl->certificates)) {
                $destinationPath = public_path('images/' . $imageUrl->certificates);
                if (File::exists($destinationPath)) {
                    unlink($destinationPath);
                }
            }
        }
        $existingEntry = $this->doctor_award_repository
              ->where('id', $data['id'] ?? null)
              ->where('user_id', $data['user_id'])
              ->first();
  
          if (!empty($existingEntry)) {
              $result = $this->doctor_award_repository
                  ->where('id', $data['id'] ?? null)
                  ->where('user_id', $data['user_id'])
                  ->update($payload);
          } else {
              $result = $this->doctor_award_repository->create(array_merge($payload, [
                  'user_id' => $data['user_id']
              ]));
          }
        return $result;
  }

}
