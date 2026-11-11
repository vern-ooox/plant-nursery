<?php

use App\Http\Controllers\PlantController;
use App\Http\Controllers\PlantReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('plants', PlantController::class);

    Route::get('/reports/plants', [PlantReportController::class, 'index'])
        ->name('reports.plants');

    Route::get('/reports/plants/excel', [PlantReportController::class, 'exportExcel'])
        ->name('reports.plants.excel');

    Route::get('/reports/plants/pdf', [PlantReportController::class, 'exportPdf'])
        ->name('reports.plants.pdf');
});

require __DIR__.'/auth.php';