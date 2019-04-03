<?php

/* example of not using a controller
Route::get('/', function () {
    return view('home');
});
*/
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home'])->middleware('example');

Route::get('contacto', ['as' => 'contacto', 'uses' => 'PagesController@contacto']);

// We declare nombre variable aqui
Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludos'])->where('nombre', "[A-Za-z]+");

Route::post('contacto', 'PagesController@mensajes');

Route::get('mensajes/create', ['as'=>'messages.create', 'uses' => 'MessagesController@create']);

Route::post('mensajes', ['as'=>'messages.store', 'uses' => 'MessagesController@store']);

Route::get('mensajes', ['as'=>'messages.index', 'uses' => 'MessagesController@index']);
