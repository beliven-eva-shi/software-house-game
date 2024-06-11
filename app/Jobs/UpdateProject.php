<?php

namespace App\Jobs;

use App\Models\GameSession;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class UpdateProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    const TIME_UDPATE = 1;
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
        $projects = Project::where('billed', 0)->whereNotNull('dev_id')->get();
        dd($projects);

        foreach ($projects as $project) {
            $project->time_for_completion -= self::TIME_UDPATE;
            $project->save();
        }
    }
}
