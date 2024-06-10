<?php

namespace App\Jobs;

use App\Models\Salesperson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Faker\Generator as Faker;

class GenerateSalespeople implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    const MAX_SALES_UNHIRED = 5;
    const COST_DEV_FACTOR = 2;
    const TIME_NEW_PROJECT_FACTOR = 2;
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
        $noHiredSales = Salesperson::where('hired_flg', 0)->count();

        if ($noHiredSales < self::MAX_SALES_UNHIRED) {


            $seniority = rand(1, 10);
            Salesperson::create([
                'name' => $faker->name,
                'hired_flg' => 0,
                'seniority_lv' => $seniority,
                'cost' => $seniority * self::COST_DEV_FACTOR,
                'time_new_project' => $seniority * self::TIME_NEW_PROJECT_FACTOR

            ]);
            // $seniority = rand(1, 10);
            // $dev->setSeniorityAttribute($seniority);
            // $dev->save();
        }
    }
}
