<?php
namespace App\Http\Services;

use App\Http\Repositories\FaqCategoryRepository;

class FaqCategoryService 
{
    private $faqCategoryRepository;

    public function __construct(FaqCategoryRepository $faqCategoryRepository)
    {
        $this->faqCategoryRepository = $faqCategoryRepository;
    }

    /**
     * Add new faq category
     * @param $name
     */
    public function saveFaqCategory($payload)
    {
        return $this->faqCategoryRepository->create($payload);
    }

    /**
     * Update faq category
     */
    public function updateFaqCategory($id, $payload)
    {
        return $this->faqCategoryRepository->find($id)->update($payload);
    }

    /**
     * Delete faq category
     */
    public function deleteFaqCategory($id)
    {
        return $this->faqCategoryRepository->find($id)->delete();
    }

    /**
     * Get all faq categories
     */
    public function getAlFaqCategories()
    {
        return $this->faqCategoryRepository->all();
    }

    /**
     * Get paginated faq categories
     */
    public function getPaginatedFaqCategories()
    {
        return $this->faqCategoryRepository->paginate(10);
    }
}
