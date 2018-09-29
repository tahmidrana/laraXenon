<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'HomeController@index');

//menu
Route::get('/menu', 'MenuController@index');
Route::get('/menu/add_menu', 'MenuController@add_menu');
Route::post('/menu/add_menu', 'MenuController@save_menu');
