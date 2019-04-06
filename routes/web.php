<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home'])->middleware('example');

// We declare nombre variable aqui
Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludos'])->where('nombre', "[A-Za-z]+");

Route::resource('mensajes', 'MessagesController');
