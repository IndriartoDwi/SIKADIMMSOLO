<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Referensi\FakultasController;

Route::get('/', [FakultasController::class, 'index'])->name('fakultas')->middleware('rbac:fakultas');
Route::get('/data', [FakultasController::class, 'data'])->name('fakultas.data')->middleware('rbac:fakultas');
Route::post('/store', [FakultasController::class, 'store'])->name('fakultas.store')->middleware('rbac:fakultas,2');
Route::patch('/update', [FakultasController::class, 'store'])->name('fakultas.update')->middleware('rbac:fakultas,3');
Route::delete('/delete', [FakultasController::class, 'delete'])->name('fakultas.delete')->middleware('rbac:fakultas,4');

Route::get('/show_edit_form', [FakultasController::class, 'show_edit_form'])->name('fakultas.show_edit_form')->middleware('rbac:fakultas,3');
