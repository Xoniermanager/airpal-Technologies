<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Http\Services\DoctorSpecialityServices;

class SpecialtyGroupBySection extends Component
{
    /**
     * Create a new component instance.
     */
    private $specialties;
    public function __construct($specialties)
    {
      $this->specialties = $specialties;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.specialty-group-by-section' ,['specialties' => $this->specialties]
    );
    }
}
