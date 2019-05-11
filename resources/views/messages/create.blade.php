<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @extends('layout')
  @section('contenido')
  <h2>Escribeme</h2>
  @if (session()->has('info'))
  <h3> {{session('info')}} </h3>
  @else
  {{ csrf_field() }}
  <form method="POST" action="{{ route('mensajes.store') }}">
    @include('messages.form',[
      'message' => new App\Message,
      'showFields' => auth()->guest()
    ])
  </form>
  @endif
  @stop
</html>
