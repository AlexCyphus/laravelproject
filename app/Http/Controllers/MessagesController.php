<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Message;
use Carbon\Carbon;

class MessagesController extends Controller {

  function __construct(){
    $this->middleware('auth', ['except' => ['create', 'store']]);
  }

  public function index(){
      $messages = Message::all();
      return view('messages.index', compact('messages'));
    }

    public function create(){
        return view('messages.create');
    }

    public function store(Request $request){
      $this->validate($request, [
        'nombre' => 'required',
        'email' => 'required',
        'mensaje' => 'required',]);
      Message::create($request->all());
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
