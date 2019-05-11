<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Message;
use Carbon\Carbon;
use App\Events\MessageWasReceived;

class MessagesController extends Controller {

  function __construct(){
    $this->middleware('auth', ['except' => ['create', 'store']]);
  }

  public function index(){
      $messages = Message::with(['user', 'note', 'tags'])->get();
      return view('messages.index', compact('messages'));
    }

    public function create(){
        return view('messages.create');
    }

    public function store(Request $request){
      #validations
      if (auth()->guest()) {
        $this->validate($request, [
          'nombre' => 'required',
          'email' => 'required',
          'mensaje' => 'required',]);
      }
      if (auth()->check()){
        $this->validate($request, [
          'mensaje' => 'required']);
      }

      #guarda mensaje a variable
      $message = Message::create($request->all());    

      #si el usuario esta autenticado -> entonces guardamos el user_id tambien
      #describimos el relacion entre mensajes y usuarios en User.php
      if (auth()->check()) {
        $message->user_id = auth()->id();
        $message->email = auth()->user()->email;
        $message->nombre = auth()->user()->name;
        $message->save();
      }

      event(new MessageWasReceived($message));

      return redirect()->route('mensajes.create')->with('info', 'Hemos recibido tu mensaje :)');
    }

    public function show($id){
      $message = Message::findOrFail($id);
      return view('messages.show', compact('message'));
    }

    public function edit($id){
      $message = Message::findOrFail($id);
      return view('messages.edit', compact('message'));
    }

    public function update(Request $request, $id){
      Message::findOrFail($id)->update($request->all());
      return redirect()->route('mensajes.index');
    }

    public function destroy($id){
      Message::findOrFail($id)->delete();
      return redirect()->route('mensajes.index');
    }
}
