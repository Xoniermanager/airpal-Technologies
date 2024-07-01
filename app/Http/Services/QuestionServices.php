<?php
namespace App\Http\Services;
use App\Http\Repositories\questionsRepository;

class QuestionServices {
    private  $questionsRepository;
    public function __construct(QuestionsRepository $questionsRepository) {
        $this->questionsRepository = $questionsRepository;
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
      return $this->questionsRepository->with(['user','specialty'])->all();
     }
}
