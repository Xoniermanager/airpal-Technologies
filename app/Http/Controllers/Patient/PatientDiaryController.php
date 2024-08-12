<?php

namespace App\Http\Controllers\Patient;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PatientDiaryRequest;
use App\Http\Services\PatientDiaryService;

class PatientDiaryController extends Controller
{
    private $patientDiaryService;

    public function __construct(PatientDiaryService $patientDiaryService)
    {
        $this->patientDiaryService = $patientDiaryService;
    }
    public function index()
    {
        $allDiaryDetails = $this->patientDiaryService->getAllDiaryDetailsByPatientId(Auth::user()->id);
        return view('patients.diary.list', compact('allDiaryDetails'));
    }
    public function addDiary()
    {
        $diaryDetails = $this->patientDiaryService->getDiaryDetailsToday();
        return view('patients.diary.add', compact('diaryDetails'));
    }

    public function createDiary(PatientDiaryRequest $request)
    {
        try {
            $data = $request->all();
            $data['patient_id'] = Auth::user()->id;
            if (isset($data['id']) && !empty($data['id'])) {
                $response = $this->patientDiaryService->updateDetails($data);
            } else {
                $response = $this->patientDiaryService->createDetails($data);
            }
            if ($response['status'] == true) {
                return redirect(route('patient.diary.index'))->with(['success' => "Your Diary Has Been Created"]);
            } else {
                return back()->with(['error' => $response['data']]);
            }
        } catch (Exception $e) {
            return back()->with(['error' => $e->getmessage()]);
        }
    }

    public function editDiary($id)
    {
        $diaryDetails = $this->patientDiaryService->getDiaryById($id);
        return view('patients.diary.add', compact('diaryDetails'));
    }
    public function viewDiary($id)
    {
        $viewDiaryDetails = $this->patientDiaryService->getDiaryById($id);
        return view('patients.diary.view', compact('viewDiaryDetails'));
    }
}
