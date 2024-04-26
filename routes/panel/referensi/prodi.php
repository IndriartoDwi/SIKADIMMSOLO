<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Referensi\ProdiController;

Route::get('/', [ProdiController::class, 'index'])->name('prodi')->middleware('rbac:progam_studi');
Route::get('/data', [ProdiController::class, 'data'])->name('prodi.data')->middleware('rbac:progam_studi');
Route::post('/store', [ProdiController::class, 'store'])->name('prodi.store')->middleware('rbac:progam_studi,2');
Route::patch('/update', [ProdiController::class, 'store'])->name('prodi.update')->middleware('rbac:progam_studi,3');
Route::delete('/delete', [ProdiController::class, 'delete'])->name('prodi.delete')->middleware('rbac:progam_studi,4');

Route::get('/show_edit_form', [ProdiController::class, 'show_edit_form'])->name('prodi.show_edit_form')->middleware('rbac:progam_studi,3');
