<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Referensi\KampusController;

Route::get('/', [KampusController::class, 'index'])->name('kampus')->middleware('rbac:kampus');
Route::get('/data', [KampusController::class, 'data'])->name('kampus.data')->middleware('rbac:kampus');
Route::post('/store', [KampusController::class, 'store'])->name('kampus.store')->middleware('rbac:kampus,2');
Route::patch('/update', [KampusController::class, 'store'])->name('kampus.update')->middleware('rbac:kampus,3');
Route::delete('/delete', [KampusController::class, 'delete'])->name('kampus.delete')->middleware('rbac:kampus,4');
