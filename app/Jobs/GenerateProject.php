<?php

namespace App\Jobs;

use App\Models\Project;
use App\Models\Salesperson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Faker\Generator as Faker;

class GenerateProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    const TIME_UDPATE = 1;
    const PROJECT_VALUE_FACTOR = 10;
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
        $salespeople = Salesperson::all();


        foreach ($salespeople as $salesperson) {
            $salesperson->time_new_project -= self::TIME_UDPATE;

            if ($salesperson->time_new_project <= 0) {
                $complexity = rand(1, 10);

                $value = $complexity * $salesperson->seniority_lv * self::PROJECT_VALUE_FACTOR;

                Project::create([
                    'title' => $faker->sentence,
                    'complexity' => $complexity,
                    'value' => $value,
                    'time_for_completion' => 10,

                ]);


                $salesperson->time_new_project = 100;
            }

            $salesperson->save();
        }
    }
}
