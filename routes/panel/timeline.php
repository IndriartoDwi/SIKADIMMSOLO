<?php
Route::get('/', 'TimelineController@index')->name('timeline')->middleware('rbac:timeline');
Route::get('/data', 'TimelineController@data')->name('timeline.data')->middleware('rbac:timeline');
Route::post('/store', 'TimelineController@store')->name('timeline.store')->middleware('rbac:timeline,2');
Route::patch('/switch', 'TimelineController@switchStatus')->name('timeline.switch')->middleware('rbac:timeline,3');
Route::delete('/delete', 'TimelineController@delete')->name('timeline.delete')->middleware('rbac:timeline,4');

Route::patch('/verifikasi-timeline', 'TimelineController@verifikasiTimeline')->name('timeline.verifikasiTimeline')->middleware('rbac:timeline,3');
