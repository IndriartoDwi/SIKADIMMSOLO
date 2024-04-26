<?php
Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('rbac:beranda');
Route::post('/filter-tahun', 'DashboardController@filter_tahun')->name('dashboard.filter_tahun')->middleware('rbac:beranda');
