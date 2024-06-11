<?php

use App\Jobs\GenerateDev;
use App\Jobs\GenerateProject;
use App\Jobs\GenerateSalespeople;
use App\Jobs\UpdateAsset;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();



Schedule::job(new GenerateProject)->everySecond();
Schedule::job(new GenerateDev)->everySecond();
Schedule::job(new GenerateSalespeople)->everySecond();
Schedule::job(new UpdateAsset)->everySecond();
