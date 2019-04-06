<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;
use Carbon\Carbon;

class MessagesController extends Controller {

  public function index(){
      $messages = DB::table('messages')->get();
      return view('messages.index', compact('messages'));
    }

    public function create(){
        return view('messages.create');
    }

    public function store(Request $request){
      $this->validate($request, [
        'nombre' => 'required',
        'email' => 'required',
        'mensaje' => 'required',
      ]);

      DB::table('messages')->insert([
        "nombre" => $request->input('nombre'),
        "email" => $request->input('email'),
        "mensaje" => $request->input('mensaje'),
        "created_at" => Carbon::now(),
        "updated_at" => Carbon::now(),
      ]);

      return redirect()->route('mensajes.index');
    }

    public function show($id){
      $message = DB::table('messages')->where('id', $id)->first();
      return view('messages.show', compact('message'));
    }

    public function edit($id){
      $message = DB::table('messages')->where('id', $id)->first();
      return view('messages.edit', compact('message'));
    }

    public function update(Request $request, $id){
      DB::table('messages')->where('id', $id)->update([
        "nombre" => $request->input('nombre'),
        "email" => $request->input('email'),
        "mensaje" => $request->input('mensaje'),
        "updated_at" => Carbon::now(),
      ]);

      return redirect()->route('mensajes.index');
    }

    public function destroy($id){
      DB::table('messages')->where('id', $id)->delete();
      return redirect()->route('mensajes.index');
    }
}
