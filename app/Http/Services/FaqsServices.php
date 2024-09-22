<?php
namespace App\Http\Services;
use App\Http\Repositories\FaqsRepository;

class FaqsServices 
{

   private  $faqsRepository;

   public function __construct(FaqsRepository $faqsRepository) 
   {
      $this->faqsRepository = $faqsRepository;
   }

   /**
    * Add a new Frequently Asked Question
    */
   public function addFaqs($data)
   {
      return $this->faqsRepository->create($data);
   }

   /**
    * Update existing Frequently Asked Question
    */
   public function update($data , $id)
   {
      return $this->faqsRepository->find($id)->update($data);
   }

   /**
    * Delete existing Frequently Asked Question using ID
    */
   public function destroy($id)
   {
      return $this->faqsRepository->find($id)->delete();
   }

   /**
    * Get Frequently Asked Question with pagination having 10 records in each page
    */
   public function getPaginateData()
   {
      return $this->faqsRepository->with('faqCategory')->paginate(10)->setPath(route('admin.faqs.index'));
   }

   /**
    * Get all Frequently Asked Question without using pagination
    */
   public function all()
   {
      return $this->faqsRepository->with('faqCategory')->all();
   }
}
