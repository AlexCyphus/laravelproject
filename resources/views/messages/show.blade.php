@extends('layout')

@section('contenido')
  <h1> Mensaje {{$message->id}}</h1>
  <p> Enviado por {{$message->email}} </p>
  <p> {{$message->mensaje}} </p>

  <a href="{{route('mensajes.index')}}" class='btn btn-primary'>Volver a todos los mensajes</a>

@stop
