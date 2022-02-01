<?php

use App\Http\Controllers\ProjectToggleController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\TopicToggleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->middleware(['guest']);

Route::middleware(['auth'])->group(function () {
    Route::get('/roadmap', RoadmapController::class)->name('roadmap');
    Route::post('/topic-toggle/{topic}', TopicToggleController::class)->name('topic-toggle');
    Route::post('/project-toggle/{project}', ProjectToggleController::class)->name('project-toggle');
});


require __DIR__.'/auth.php';
