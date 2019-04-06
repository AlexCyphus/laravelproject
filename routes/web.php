<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludos'])->where('nombre', "[A-Za-z]+");

Route::resource('mensajes', 'MessagesController');

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('test', function(){
  $user = new App\User;
  $user->name = 'Alex';
  $user->email = 'alex@gmail.com';
  $user->password = bcrypt('123');
  $user->save();

  return $user;
});
