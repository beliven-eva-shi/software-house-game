<?php

namespace App\Livewire;

use App\Models\GameSession;
use Livewire\Component;

class Assets extends Component
{
    public $assets;
    public function begin()
    {
        $running = 'running';
        while ($running === 'running') {
            $this->assets = GameSession::first()->company_assets;

            $this->stream(
                to: 'assets',
                content: $this->assets,
                replace: true,
            );
            // sleep(10);

        }
    }

    public function render()
    {

        return view('livewire.assets', [
            'session' => GameSession::first()
        ]);
    }
}
