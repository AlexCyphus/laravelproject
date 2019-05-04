<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\HTTP\Requests\UpdateUserRequest;

class UsersController extends Controller {

  function __construct(){
    // si no estas logged in y quieres acceder una pagina relacionado con los Usuarios
    // el middleware te redirecciona a /login
    $this->middleware('auth');
    $this->middleware('roles:admin', ['except' => ['edit']]);
}

    public function index()
    {
      $users = \App\User::all();
      return view('users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);
      return view('users.edit', compact('user')); // passing the user variable
    }

    public function update(UpdateUserRequest $request, $id)
    {
      User::findOrFail($id)->update($request->all());
      return back()->with('info', 'usuario actualizado');
    }

    public function destroy($id)
    {
        //
    }
}
