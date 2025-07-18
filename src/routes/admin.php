<?php
// Route::get('', 'AdminController@index')->name('index');

// 환경설정
Route::get('manage-menu', 'ManageMenuController@index')->name('menu.index');
Route::post('manage-menu/store', 'ManageMenuController@store')->name('menu.store');
Route::put('manage-menu/update/order/{menu}', 'ManageMenuController@updateOrder')->name('menu.order');
Route::put('manage-menu/destroy/{menu}', 'ManageMenuController@destroy')->name('menu.destroy');
Route::get('components', 'ComponentsController@index')->name('component.index');
Route::get('component/activate/{component}', 'ComponentsController@activate')->name('component.activate');


