<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Referensi\KomisariatController;

Route::get('/', [KomisariatController::class, 'index'])->name('komisariat')->middleware('rbac:komisariat');
Route::get('/data', [KomisariatController::class, 'data'])->name('komisariat.data')->middleware('rbac:komisariat');
Route::post('/store', [KomisariatController::class, 'store'])->name('komisariat.store')->middleware('rbac:komisariat,2');
Route::patch('/update', [KomisariatController::class, 'store'])->name('komisariat.update')->middleware('rbac:komisariat,3');
Route::delete('/delete', [KomisariatController::class, 'delete'])->name('komisariat.delete')->middleware('rbac:komisariat,4');
