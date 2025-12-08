<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UcapanController;

// Frontend Routes
Route::get('/', function () {
    return view('main');
});

Route::get('/cover', function () {
    return view('frontend.index');
})->name('cover');

Route::get('/main', function () {
    return view('main');
})->name('main');

// API Routes for Ucapan
Route::prefix('api')->group(function () {
    Route::get('/ucapan', [UcapanController::class, 'index'])->name('api.ucapan.index');
    Route::post('/ucapan', [UcapanController::class, 'store'])->name('api.ucapan.store');
    Route::delete('/ucapan/{id}', [UcapanController::class, 'destroy'])->name('api.ucapan.destroy');
    Route::delete('/ucapan', [UcapanController::class, 'destroyAll'])->name('api.ucapan.destroyAll');
});
