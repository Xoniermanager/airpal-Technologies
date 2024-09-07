<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PartnerSlider extends Component
{
    public $partners;
    public $show;

    public function __construct($partners, $show = true)
    {
        $this->partners = $partners;
        $this->show = $show;
    }

    public function render()
    {
        return view('components.partner-slider');
    }
}
