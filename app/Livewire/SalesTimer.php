<?php

namespace App\Livewire;

use App\Models\Salesperson;
use Livewire\Component;

class SalesTimer extends Component
{
    public function render()
    {
        return view(
            'livewire.sales-timer',
            [
                'sales' => Salesperson::where('hired_flg', 1)->get()
            ]
        );
    }
}
