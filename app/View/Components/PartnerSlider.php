<?php

namespace App\View\Components;

use App\Http\Services\PartnersServices;
use App\Models\Partner;
use Illuminate\View\Component;

class PartnerSlider extends Component
{
    public $partnersServices;
    public $show;

    public function __construct(PartnersServices $partnersServices, $show = true)
    {
        $this->show = $show;
        $this->partnersServices = $partnersServices;
    }

    public function render()
    {
        return view('components.partner-slider',['partners'=> $this->partnersServices->all()]);
    }
}
