<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludos'])->where('nombre', "[A-Za-z]+");

Route::get('roles', function() {
  return \App\Role::with('user')->get();
});

Route::resource('mensajes', 'MessagesController');
Route::resource('usuarios', 'UsersController');


Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

/* App\User::create([
   'name' => 'alex',
   'email' => 'alex@gmail.com',
   'password' => bcrypt('123'),
   'role_id' => 1,
 ]);

 App\User::create([
   'name' => 'moderador',
   'email' => 'moderador@gmail.com',
   'password' => bcrypt('123'),
   'role_id' => 2,
 ]);
*/
