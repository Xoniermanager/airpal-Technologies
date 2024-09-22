<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\FaqCategoryService;
use App\Http\Requests\CreateFaqCategoryRequest;
use App\Models\FaqCategory;

class FaqCategoryController extends Controller
{
    private $faqCategoryService;

    public function __construct(FaqCategoryService $faqCategoryService)
    {
        $this->faqCategoryService = $faqCategoryService;
    }

    /**
     * List all faq categories
     */
    public function index()
    {
        $faqCategories = $this->faqCategoryService->getPaginatedFaqCategories();

        return view('admin.faq-category.index',[
            'faqCategories'      =>  $faqCategories
        ]);
    }

    /**
     * Create new faq category
     */
    public function create(CreateFaqCategoryRequest $request)
    {
        $payload = $request->validated();

        $faqCategory = $this->faqCategoryService->saveFaqCategory($payload);

        if($faqCategory)
        {
            $faqCategories = $this->faqCategoryService->getPaginatedFaqCategories();
            return [
                'status'    =>  true,
                'data'      =>  view('admin.faq-category.faq-category-list',[
                    'faqCategories'      =>  $faqCategories
                ])->render()
            ];
        }
        else
        {
            return [
                'status'    =>  false,
                'data'      =>  'Something went wrong, Please try later!'
            ];
        }
    }


    /**
     * Update faq category
     */
    public function update(FaqCategory $faqCategory, CreateFaqCategoryRequest $request)
    {
        $payload = $request->validated();

        $faqCategory = $this->faqCategoryService->updateFaqCategory($faqCategory->id, $payload);

        if($faqCategory)
        {
            $faqCategories = $this->faqCategoryService->getPaginatedFaqCategories();
            return [
                'status'    =>  true,
                'data'      =>  view('admin.faq-category.faq-category-list',[
                    'faqCategories'      =>  $faqCategories
                ])->render()
            ];
        }
        else
        {
            return [
                'status'    =>  false,
                'data'      =>  'Something went wrong, Please try later!'
            ];
        }
    }

    /**
     * Delete any existing faq category
     */
    public function delete($faqCategoryId)
    {
        $deleted = $this->faqCategoryService->deleteFaqCategory($faqCategoryId);
        if($deleted)
        {
            $faqCategories = $this->faqCategoryService->getPaginatedFaqCategories();
            return [
                'status'    =>  true,
                'data'      =>  view('admin.faq-category.faq-category-list',[
                    'faqCategories'      =>  $faqCategories
                ])->render()
            ];
        }
        else
        {
            return [
                'status'    =>  false,
                'data'      =>  'Something went wrong, Please try later!'
            ];
        }

    }
}
