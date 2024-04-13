<?php
Route::get('/', 'DokumenController@index')->name('dokumen')->middleware('rbac:dokumen');
Route::get('/data', 'DokumenController@data')->name('dokumen.data')->middleware('rbac:dokumen');
Route::post('/store', 'DokumenController@store')->name('dokumen.store')->middleware('rbac:dokumen,2');
Route::patch('/update', 'DokumenController@update')->name('dokumen.update')->middleware('rbac:dokumen,3');
Route::patch('/switch', 'DokumenController@switchStatus')->name('dokumen.switch')->middleware('rbac:dokumen,3');
Route::delete('/delete', 'DokumenController@delete')->name('dokumen.delete')->middleware('rbac:dokumen,4');
Route::patch('/update/roles', 'DokumenController@updateRole')->name('dokumen.update.roles')->middleware('rbac:dokumen,3');
Route::patch('/reset-password', 'DokumenController@resetPassword')->name('dokumen.reset-password')->middleware('rbac:dokumen,3');
Route::patch('/change-password', 'DokumenController@changePassword')->name('dokumen.change-password');
