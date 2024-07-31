<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\QuestionsRepository;

class QuestionServices {
    private  $questionsRepository;
    private  $UserRepository;
    public function __construct(QuestionsRepository $questionsRepository,UserRepository $UserRepository ) {
        $this->questionsRepository = $questionsRepository;
        $this->UserRepository = $UserRepository;
     }



     public function addQuestions($data){
        return $this->questionsRepository->create($data);
     }
     public function update($data , $id){
      return $this->questionsRepository->find($id)->update($data);
     }
     public function destroy($id){
        return $this->questionsRepository->find($id)->delete();
     }
     public function getPaginateData(){
      return $this->questionsRepository->paginate(10)->setPath(route('admin.index.questionsServices'));
     }
     public function all(){
      return $this->questionsRepository->with(['user','specialty','options'])->paginate();
     }
     public function getQuestionByDoctorId(){
      return $this->questionsRepository->where('doctor_id',Auth::id())->with(['user','specialty','options'])->paginate();
     }

     public function doctorQuestionFilter($searchedKey){

      $data['doctorId'] = array_key_exists('doctorId', $searchedKey) ? $searchedKey['doctorId'] : '';
      $data['specialty']  = array_key_exists('specialty', $searchedKey) ? $searchedKey['specialty'] : '';
      $data['answerType']  = array_key_exists('answerType', $searchedKey) ? $searchedKey['answerType'] : '';

      $query = $this->questionsRepository->newQuery();

    
      if (!empty($data['doctorId'])) {
            $query->where('doctor_id', $data['doctorId']);
      }
      if (!empty($data['specialty'])) {
         $query->where('specialty_id', $data['specialty']);
      }
      if (!empty($data['answerType'])) {
         $query->where('answer_type', $data['answerType']);
      }
         return $query->paginate(10);
      // return $this->questionsRepository->where('doctor_id',$id)->with('options')->paginate(10);
      
     }

     public function getDoctorQuestionById($id){
      return $this->questionsRepository->where('doctor_id',$id)->with('options')->paginate(10);
     }
   

   //   public function searchInQuestions($searchKey)
   //   {
   
   //     $data['key']          = array_key_exists('key', $searchKey) ? $searchKey['key'] : '';
   //     $data['status']       = array_key_exists('status', $searchKey) ? $searchKey['status'] : '';
   //     $data['departmentID'] = array_key_exists('departmentID', $searchKey) ? $searchKey['departmentID'] : '';
   
   //     return $this->questionsRepository->where(function($query) use ($data) {
   //       if (!empty($data['key'])) {
   //           $query->where('name', 'like', "%{$data['key']}%");
   //       }
   //       if (!empty($data['departmentID'])) {
   //           $query->where('department_id', $data['departmentID']);
   //       }
   //       if (isset($data['status'])) {
   //           $query->where('status', $data['status']);
   //       }
   //     })->get();
   //    }

public function filterInQuestion($searchedKey)
  {
    $data['doctor_id']  = array_key_exists('doctor_id', $searchedKey) ? $searchedKey['doctor_id'] : '';
    $data['specialty']  = array_key_exists('specialty_id', $searchedKey) ? $searchedKey['specialty_id'] : '';
    $data['answerType'] = array_key_exists('answerType', $searchedKey) ? $searchedKey['answerType'] : '';

    $query = $this->questionsRepository->newQuery();

    if (!empty($data['doctor_id'])) {
          $query->whereIn('doctor_id', $data['doctor_id']);
    }
    if (!empty($data['answerType'])) {
          $query->whereIn('answerType', $data['answerType']);
    }
    if (!empty($data['answerType'])) {
      $query->whereIn('answerType', $data['answerType']);
   }
       return $query->paginate(6);
  }

  /**
   * Creating HTML for the selected question
   * show the html in pop up to update
   */
  public function getSelectedQuestionHTML($questionId)
  {
     
  }
}
