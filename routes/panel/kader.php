<?php
Route::get('/', 'KaderController@index')->name('kader')->middleware('rbac:kader');
Route::get('/data', 'KaderController@data')->name('kader.data')->middleware('rbac:kader');
Route::post('/store', 'KaderController@store')->name('kader.store')->middleware('rbac:kader,2');
Route::delete('/delete', 'KaderController@delete')->name('kader.delete')->middleware('rbac:kader,4');

Route::get('/show_edit_form', 'KaderController@show_edit_form')->name('kader.show_edit_form')->middleware('rbac:kader,3');
Route::delete('/delete-repeater', 'KaderController@delete_repeater')->name('kader.repeater')->middleware('rbac:kader,4');
