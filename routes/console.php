<?php

use App\Jobs\GenerateDev;
use App\Jobs\GenerateProject;
use App\Jobs\GenerateSalespeople;
use App\Jobs\UpdateAsset;
use App\Jobs\UpdateProject;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();



Schedule::job(new GenerateProject)->everySecond();
Schedule::job(new UpdateProject)->everySecond();
Schedule::job(new GenerateDev)->everyTenSeconds();
Schedule::job(new GenerateSalespeople)->everyTenSeconds();
Schedule::job(new UpdateAsset)->everyTenSeconds();
