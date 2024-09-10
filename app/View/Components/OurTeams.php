<?php

namespace App\View\Components;

use App\Http\Services\OurTeamServices;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OurTeams extends Component
{
    /**
     * Create a new component instance.
     */
    private  $ourTeamServices;
    public function __construct(OurTeamServices $ourTeamServices)
    {
        $this->ourTeamServices = $ourTeamServices;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.our-teams',['ourTeams' => $this->ourTeamServices->all()]);
    }
}
