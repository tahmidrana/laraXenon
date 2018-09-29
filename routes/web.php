<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'HomeController@index');

//menu
Route::get('/menu', 'MenuController@index');
Route::get('/menu/add_menu', 'MenuController@add_menu');
Route::get('/menu/delete_menu/{id}', 'MenuController@delete_menu');
Route::post('/menu/add_menu', 'MenuController@save_menu');
Route::get('/menu/update_menu/{id}', 'MenuController@update_menu');
Route::post('/menu/update_menu/{id}', 'MenuController@save_updated_menu');
