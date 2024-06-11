<?php

namespace App\Jobs;

use App\Models\Developer;
use App\Models\GameSession;
use App\Models\Salesperson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateAsset implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $hiredSales = Salesperson::where('hired_flg', 1);
        $hiredDevs = Developer::where('hired_flg', 1);
        $session = GameSession::first();

        foreach ($hiredDevs as $hiredDev) {
            $session->company_assets -= $hiredDev->cost;
        }
        foreach ($hiredSales as $hiredSale) {
            $session->company_assets -= $hiredSale->cost;
        }
        //$session->company_assets -= 10;
        $session->save();
    }
}
