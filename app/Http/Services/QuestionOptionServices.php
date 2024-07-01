<?php
namespace App\Http\Services;
use App\Http\Repositories\QuestionsOptionsRepository;

class QuestionOptionServices {
    private  $questionsOptionsRepository;
    public function __construct(QuestionsOptionsRepository $questionsOptionsRepository) {
        $this->questionsOptionsRepository = $questionsOptionsRepository;
     }
     public function addQuestionsOptions($data){
        return $this->questionsOptionsRepository->create($data);
     }
     public function update($data , $id){
      return $this->questionsOptionsRepository->find($id)->update($data);
     }
     public function destroy($id){
        return $this->questionsOptionsRepository->find($id)->delete();
     }
     public function getPaginateData(){
      return $this->questionsOptionsRepository->paginate(10)->setPath(route('admin.index.questionsOptionsServices'));
     }
     public function all(){
      return $this->questionsOptionsRepository->all();
     }
}
