<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateMessageRequest;


class PagesController extends Controller
{
    protected $request;

    public function __construct(Request $request){
      // the request class is assigned to $request variables
      // $this class request method IS the request
      $this->request = $request;
    }

    public function home(){return view('home');}

    //in case $nombre = null => invitado
    public function saludos($nombre = 'Invitado'){
      $consolas = ['PS4', 'GameCube', 'xBox'];
      //return view passing it our two variables
      return view('saludo', compact('consolas', 'nombre'));
    }
  }
