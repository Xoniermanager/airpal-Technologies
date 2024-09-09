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
    private $doctor_specialty;
    public function __construct(DoctorSpecialityServices $doctor_specialty)
    {
        $this->doctor_specialty = $doctor_specialty;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $specialtiesByDoctorsCount =  $this->doctor_specialty->getSpecialtyGroupByDoctor();
        return view('components.specialty-group-by-section',['specialties' => $specialtiesByDoctorsCount]);
    }
}
