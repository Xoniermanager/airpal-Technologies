<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Support\Arr;
use App\Models\DoctorEducation;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Http\Repositories\DoctorEducationRepository;

class DoctorEducationServices
{
    private  $doctor_education_repository;
    public function __construct(DoctorEducationRepository $doctor_education_repository)
    {
        $this->doctor_education_repository = $doctor_education_repository;
    }

public function addDoctorEducation($data)
{
    $userId = $data['user_id'];
    $results = [];

    foreach ($data['education'] as $education) {
        $payload = [
            'institute_name'   => $education['name'],
            'course_id'        => $education['course'],
            'start_date'       => $education['start_date'],
            'end_date'         => $education['end_date']
        ];

        if (isset($education['certificates']) && !empty($education['certificates'])) {
            $file = $education['certificates'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath, $filename);
            $payload['certificates'] = $filename;

            // Delete the old certificate if exists
            $imageUrl = $this->doctor_education_repository
                ->where('user_id', $userId)
                ->where('course_id', $education['course'])
                ->first();
            if (isset($imageUrl->certificates)) {
                $destinationPath = public_path('images/' . $imageUrl->certificates);
                if (File::exists($destinationPath)) {
                    unlink($destinationPath);
                }
            }
        }
        // Check if the education entry already exists
        $existingEntry = $this->doctor_education_repository
            ->where('id', $education['id'] ?? null)
            ->where('user_id', $userId)
            ->first();

        if (!empty($existingEntry)) {
            $result = $this->doctor_education_repository
                ->where('id', $education['id'] ?? null)
                ->where('user_id', $userId)
                ->update($payload);
        } else {
            $result = $this->doctor_education_repository->create(array_merge($payload, [
                'user_id' => $userId
            ]));
        }

        $results[] = $result;
    }

    return $results;
}

    // }
    // public function addDoctorEducation($data)
    // {
    //     $userId = $data['user_id'];
    //     $payload = [];

    //     foreach ($data['education'] as $education) {
    //         $payload = [
    //             'institute_name'   => $education['name'],
    //             'course_id'        => $education['course'],
    //             'start_date'       => $education['start_date'],
    //             'end_date'         => $education['end_date']
    //         ];

    //         if (isset($education['certificates'])) {
    //             $file = $education['certificates'];
    //             $filename = time() . '.' . $file->getClientOriginalExtension();
    //             $destinationPath = public_path('images');
    //             $file->move($destinationPath, $filename);
    //             $payload['certificates'] = $filename;

    //             // Delete the old certificate if exists
    //             $imageUrl = $this->doctor_education_repository
    //                 ->where('user_id', $userId)
    //                 ->where('course_id', $education['course'])
    //                 ->first();
    //             if (isset($imageUrl->certificates)) {
    //                 $destinationPath = public_path('images/' . $imageUrl->certificates);
    //                 if (File::exists($destinationPath)) {
    //                     unlink($destinationPath);
    //                 }
    //             }
    //         }

    //         // Check if the education entry already exists
    //         $existingEntry = $this->doctor_education_repository
    //             ->where('id', $education['id'] ?? null)
    //             ->where('user_id', $userId)
    //             ->first();

    //         if (!empty($existingEntry)) {
    //             return  $this->doctor_education_repository
    //                 ->where('id', $education['id'] ?? null)
    //                 ->where('user_id', $userId)
    //                 ->update($payload);
    //         } else {
    //             return  $this->doctor_education_repository->create(array_merge($payload, [
    //                 'user_id' => $userId
    //             ]));
    //         }
    //     }
    // }

    // public function deleteDetails($id)
    // {
    //     $education = $this->doctor_education_repository->where('id',20);

    //     if (!$education) {
    //         return response()->json(['status' => 'error', 'message' => 'Education record not found.'], 404);
    //     }

    //     $deleted = $education->delete();

    //     if ($deleted) {
    //         return response()->json(['status' => 'success', 'message' => 'Education record deleted successfully.']);
    //     } else {
    //         return response()->json(['status' => 'error', 'message' => 'Failed to delete education record.'], 500);
    //     }

    // }

    public function deleteDetails($id)
    {
        // Find the education record by ID
        $education = $this->doctor_education_repository->find($id);

        // Check if the record exists
        if (!$education) {
            return response()->json(['status' => 'error', 'message' => 'Education record not found.'], 404);
        }
        // Attempt to delete the record
        try {
            $deleted = $education->delete();

            if ($deleted) {
                return response()->json(['status' => 'success', 'message' => 'Education record deleted successfully.']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Failed to delete education record.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    

public function createOrUpdateEducationSingleRecord($data)
{
        $userId = $data['user_id'];
        $payload = [
            'user_id'          => $userId,
            'institute_name'   => $data['name'],
            'course_id'        => $data['course'],
            'start_date'       => $data['start_date'],
            'end_date'         => $data['end_date']
        ];

        if (isset($data['certificates']) && !empty($data['certificates'])) {
            $file = $data['certificates'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath, $filename);
            $payload['certificates'] = $filename;

            // Delete the old certificate if exists
            $imageUrl = $this->doctor_education_repository
                ->where('user_id', $userId)
                ->where('course_id', $data['course'])
                ->first();
            if (isset($imageUrl->certificates)) {
                $destinationPath = public_path('images/' . $imageUrl->certificates);
                if (File::exists($destinationPath)) {
                    unlink($destinationPath);
                }
            }
        }
        // Check if the education entry already exists
        $existingEntry = $this->doctor_education_repository
            ->where('id', $data['id'] ?? null)
            ->where('user_id', $userId)
            ->first();

        if (!empty($existingEntry)) {
            $result = $this->doctor_education_repository
                ->where('id', $data['id'] ?? null)
                ->where('user_id', $userId)
                ->update($payload);
        } else {
            $result = $this->doctor_education_repository->create(array_merge($payload, [
                'user_id' => $userId
            ]));
        }
      return $result;
}



}
