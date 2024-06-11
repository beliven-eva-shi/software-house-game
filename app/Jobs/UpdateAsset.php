<?php

namespace App\Jobs;

use App\Models\Developer;
use App\Models\GameSession;
use App\Models\Project;
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
        $projects = Project::where('billed', 0)->whereNotNull('dev_id')->where('time_for_completion', '<=', 0)->get();
        $hiredSales = Salesperson::where('hired_flg', 1)->get();
        $hiredDevs = Developer::where('hired_flg', 1)->get();
        $session = GameSession::first();

        foreach ($projects as $project) {
            // Update assets with value of project
            $session->company_assets += $project->value;
            $project->billed = 1;
            $project->save();
        }

        //Update asset with employee costs
        foreach ($hiredDevs as $hiredDev) {
            $session->company_assets -= $hiredDev->cost;
        }
        foreach ($hiredSales as $hiredSale) {
            $session->company_assets -= $hiredSale->cost;
        }

        $session->save();
    }
}
