<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Http\Services\TestimonialServices;

class TestimonialSlider extends Component
{
    /**
     * Create a new component instance.
     */
    public $testimonialServices;
    public $show;

    public function __construct(TestimonialServices $testimonialServices, $show = true)
    {
        $this->testimonialServices = $testimonialServices;
        $this->show = $show;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.testimonial-slider',['testimonials' => $this->testimonialServices->all()]);
    }
}
