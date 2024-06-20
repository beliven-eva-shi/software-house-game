<?php

namespace App\Livewire;

use App\Models\Developer;
use App\Models\Project;
use Livewire\Component;

class ProjectTimer extends Component
{
    public function render()
    {
        return view(
            'livewire.project-timer',
            [
                'projects' => Project::where('billed', 0)->get(),
                'devs' => Developer::where('hired_flg', true)->where('available_flg', true)->get(),
            ]
        );
    }
}
