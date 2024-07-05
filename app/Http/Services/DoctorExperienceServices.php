<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use App\Http\Repositories\DoctorExperienceRepository;

class DoctorExperienceServices
{
    private  $doctor_experience_repository;
    public function __construct(DoctorExperienceRepository $doctor_experience_repository)
    {
        $this->doctor_experience_repository = $doctor_experience_repository;
    }

    public function addDoctorExperience($data)
    {
        $userId = $data['user_id'];

        foreach ($data['experience'] as $experience) {
            $payload = [
                'job_title'       => $experience['job_title'],
                'hospital_id'     => $experience['hospital'],
                'location'        => $experience['location'],
                'start_date'      => $experience['start_date'],
                'end_date'        => $experience['end_date'],
                'job_description' => $experience['description']
            ];

            if (isset($experience['certificates'])) {
                $file = $experience['certificates'];
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('images');
                $file->move($destinationPath, $filename);
                $payload['certificates'] = $filename;

                // Delete the old certificate if exists
                $imageUrl = $this->doctor_experience_repository
                    ->where('user_id', $userId)
                    ->where('hospital_id', $experience['hospital'])
                    ->first();
                if (isset($imageUrl->certificates)) {
                    $oldCertificatePath = public_path('images/' . $imageUrl->certificates);
                    if (File::exists($oldCertificatePath)) {
                        unlink($oldCertificatePath);
                    }
                }
            }
            // Check if the experience entry already exists
            $existingEntry = $this->doctor_experience_repository
                ->where('id', $experience['id'] ?? null)
                ->where('user_id', $userId)
                ->first();
            if ($existingEntry) {
                $this->doctor_experience_repository
                    ->where('id', $experience['id'] ?? null)
                    ->where('user_id', $userId)
                    ->update($payload);
            } else {
                // Create new entry
                $this->doctor_experience_repository->create(array_merge($payload, [
                    'user_id' => $userId
                ]));
            }
        }

        return true;
    }

    public function deleteDetails($id)
    {
        $experience = $this->doctor_experience_repository->find($id);

        if (!$experience) {
            return false; // Indicate failure if experience record not found
        }

        try {
            $deleted = $experience->delete();
            return $deleted; // Return true or false based on deletion success
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return false;
        }
    }
}
