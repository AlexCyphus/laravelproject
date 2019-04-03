<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @extends('layout')
  @section('contenido')
  <h2>Escribeme</h2>
  @if (session()->has('info'))
  <h3> {{session('info')}} </h3>
  @else
  {{ csrf_field() }}
  <form method="POST" action="{{ route('messages.store') }}">
    {!! csrf_field() !!}
    <p><label for="nombre">
      Nombre
      <input type="text" name="nombre" value="{{old('nombre')}}">
      {!! $errors->first('nombre', '<span class=error>:message</span>')!!}
    </label></p>
    <p><label for="email">
      Email
      <input type="email" name="email" value="{{old('email')}}">
      {!! $errors->first('email', '<span class=error>:message</span>')!!}
    </label></p>
    <p><label for="mensaje" value="{{old('mensaje')}}">
      Mensaje
      <textarea name="mensaje"></textarea>
      {!! $errors->first('mensaje', '<span class=error>:message</span>')!!}
    </label></p>
    <input type="submit" value="enviar">
  </form>
  @endif
  @stop
</html>
