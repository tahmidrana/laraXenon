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

//Role
Route::get('/role', 'RoleController@index');
Route::get('/role/add_role', 'RoleController@add_role');
Route::post('/role/add_role', 'RoleController@save_role');
Route::get('/role/update_role/{id}', 'RoleController@update_role');
Route::post('/role/update_role/{id}', 'RoleController@save_updated_role');
Route::get('/role/delete_role/{id}', 'RoleController@delete_role');

