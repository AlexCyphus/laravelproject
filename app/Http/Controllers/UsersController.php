<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\HTTP\Requests\UpdateUserRequest;
use App\HTTP\Requests\CreateUserRequest;


class UsersController extends Controller {

  function __construct(){
    // si no estas logged in y quieres acceder una pagina relacionado con los Usuarios
    // el middleware te redirecciona a /login
    $this->middleware('auth', ['except' => ['show']]);
    //except means dont apply it on these functions
    $this->middleware('roles:admin', ['except' => ['edit', 'update', 'show']]);
}

    public function index()
    {
      $users = User::with(['roles', 'note', 'tags'])->get();
      return view('users.index', compact('users'));
    }

    public function create()
    {
      $roles = Role::pluck('display_name', 'id');
      return view('users.create', compact('roles'));
    }

    public function store(CreateUserRequest $request)
    {
      $user = User::create($request->all());
      $user->roles()->attach($request->roles);
      return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
      $user = User::findOrFail($id);
      return view('users.show', compact('user'));
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);
      $this->authorize('edit', $user);

      # where ID is the llave
      $roles = Role::pluck('display_name', 'id');
      return view('users.edit', compact('user', 'roles')); // passing the user variable
    }

    public function update(UpdateUserRequest $request, $id)
    {
      $user = User::findOrFail($id);
      $this->authorize('update', $user);
      $user->update($request->only('name', 'email'));
      $user->roles()->sync($request->roles);
      return back()->with('info', 'usuario actualizado');
    }

    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $this->authorize('destroy', $user);
      $user->delete();
      return back();
    }
}
