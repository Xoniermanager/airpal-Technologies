<?php
namespace App\Http\Services;
use App\Http\Repositories\FaqsRepository;

class FaqsServices {
    private  $faqsRepository;
    public function __construct(FaqsRepository $faqsRepository) {
        $this->faqsRepository = $faqsRepository;
     }
     public function addFaqs($data){
        return $this->faqsRepository->create($data);
     }
     public function update($data , $id){
      return $this->faqsRepository->find($id)->update($data);

     }
     public function destroy($id){
        return $this->faqsRepository->find($id)->delete();
     }
     public function getPaginateData(){
      return $this->faqsRepository->paginate(10)->setPath(route('admin.index.FaqsServices'));
     }
     public function all(){
      return $this->faqsRepository->all();
     }
}




?>