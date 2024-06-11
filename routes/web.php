<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SalespersonController;
use App\Models\Developer;
use App\Models\GameSession;
use App\Models\Project;
use App\Models\Salesperson;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/production', function () {
    return view(
        'production',
        [
            'projects' => Project::where('billed', 0)->get(),
            'devs' => Developer::where('hired_flg', true)->where('available_flg', true)->get(),
            'session' => GameSession::first()
        ]
    );
});

Route::get('/sales', function () {
    return view(
        'sales',
        [
            'sales' => Salesperson::where('hired_flg', 1)->get()
        ]
    );
});

Route::get('/hr', function () {
    return view(
        'hr',
        [
            'devs' => Developer::where('hired_flg', 0)->get(),
            'sales' => Salesperson::where('hired_flg', 0)->get()
        ]
    );
});

Route::put('/production/{project:id}', [ProjectController::class, 'edit']);
Route::put('/hr/dev/{dev:id}', [DeveloperController::class, 'edit']);
Route::put('/hr/sales/{sale}', [SalespersonController::class, 'edit']);
