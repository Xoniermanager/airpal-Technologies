<?php

namespace App\Http\Services;

use App\Http\Repositories\QuestionsOptionsRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\QuestionsRepository;

class QuestionServices
{
   private  $questionsRepository;
   private  $userRepository;

   private  $questionsOptionsRepository;
   public function __construct(QuestionsRepository $questionsRepository, UserRepository $userRepository, QuestionsOptionsRepository $questionsOptionsRepository)
   {
      $this->questionsRepository = $questionsRepository;
      $this->userRepository = $userRepository;
      $this->questionsOptionsRepository = $questionsOptionsRepository;
   }
   public function addQuestions($data)
   {
      return $this->questionsRepository->create($data);
   }
   public function update($data, $id)
   {
      return $this->questionsRepository->find($id)->update($data);
   }
   public function destroy($id)
   {
      return $this->questionsRepository->find($id)->delete();
   }
   public function getPaginateData()
   {
      return $this->questionsRepository->paginate(10)->setPath(route('admin.index.questionsServices'));
   }
   public function all()
   {
      return $this->questionsRepository->with(['user', 'specialty', 'options'])->paginate();
   }
   public function getQuestionByDoctorId($doctorId)
   {
      return $this->questionsRepository->where('doctor_id', $doctorId)->with(['user', 'specialty', 'options'])->paginate();
   }

   public function doctorQuestionFilter($searchedKey)
   {

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

   public function getDoctorQuestionById($id)
   {
      return $this->questionsRepository->where('doctor_id', $id)->with('options')->paginate(10);
   }


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
   public function getSelectedQuestionDetails($questionId)
   {
      return $this->questionsRepository->with('options')->where('id', $questionId)->first();
   }

   public function deleteOptions($id)
   {
      return $this->questionsOptionsRepository->where('question_id', $id)->delete();
   }
}
