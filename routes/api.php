<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UcapanController;

Route::get('/ucapan', [UcapanController::class, 'index'])->name('api.ucapan.index');
Route::post('/ucapan', [UcapanController::class, 'store'])->name('api.ucapan.store');
Route::delete('/ucapan/{id}', [UcapanController::class, 'destroy'])->name('api.ucapan.destroy');
Route::delete('/ucapan', [UcapanController::class, 'destroyAll'])->name('api.ucapan.destroyAll');
