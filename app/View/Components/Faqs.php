<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Http\Services\FaqsServices;
use Illuminate\Contracts\View\View;

class Faqs extends Component
{
    /**
     * Create a new component instance.
     */
    private $faqsServices;


    public function __construct(FaqsServices $faqsServices)
    {
        $this->faqsServices =  $faqsServices;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.faqs',['allFaqs'=>$this->faqsServices->all()]);
    }
}
