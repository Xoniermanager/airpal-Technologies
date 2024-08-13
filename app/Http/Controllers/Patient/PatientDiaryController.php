<?php

namespace App\Http\Controllers\Patient;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate(Carbon::today(), Auth::user()->id);
        return view('patients.diary.list', compact('diaryDetails'));
    }
    public function addDiary()
    {
        $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate(Carbon::today(), Auth::user()->id);
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
    public function getSearchFilterDiaryDetails(Request $request)
    {
        $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate($request->date, Auth::user()->id);
        return response()->json([
            'success' => 'Searching',
            'data'    =>  view('patients.diary.view_detail', compact('diaryDetails'))->render()
        ]);
    }
}
