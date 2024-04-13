<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Referensi\CabangController;

Route::get('/', [CabangController::class, 'index'])->name('cabang')->middleware('rbac:cabang');
Route::get('/data', [CabangController::class, 'data'])->name('cabang.data')->middleware('rbac:cabang');
Route::post('/store', [CabangController::class, 'store'])->name('cabang.store')->middleware('rbac:cabang,2');
Route::patch('/update', [CabangController::class, 'store'])->name('cabang.update')->middleware('rbac:cabang,3');
Route::delete('/delete', [CabangController::class, 'delete'])->name('cabang.delete')->middleware('rbac:cabang,4');
