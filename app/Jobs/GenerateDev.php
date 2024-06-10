<?php

namespace App\Jobs;

use App\Models\Developer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Faker\Generator as Faker;
use Psy\VersionUpdater\SelfUpdate;

class GenerateDev implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    const MAX_DEV_UNHIRED = 5;
    const COST_DEV_FACTOR = 2;

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
    public function handle(Faker $faker)
    {
        $noHiredDevs = Developer::where('hired_flg', 0)->count();

        if ($noHiredDevs < self::MAX_DEV_UNHIRED) {


            $seniority = rand(1, 10);
            Developer::create([
                'name' => $faker->name,
                'available_flg' => 1,
                'hired_flg' => 0,
                'seniority_lv' => $seniority,
                'cost' => $seniority * self::COST_DEV_FACTOR

            ]);
            // $seniority = rand(1, 10);
            // $dev->setSeniorityAttribute($seniority);
            // $dev->save();
        }
    }
}
