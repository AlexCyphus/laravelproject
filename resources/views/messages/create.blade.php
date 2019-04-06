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
    {!! csrf_field() !!}
    <p><label for="nombre">
      Nombre
      <input class='form-control' type="text" name="nombre" value="{{old('nombre')}}">
      {!! $errors->first('nombre', '<span class=error>:message</span>')!!}
    </label></p>
    <p><label for="email">
      Email
      <input class='form-control' type="email" name="email" value="{{old('email')}}">
      {!! $errors->first('email', '<span class=error>:message</span>')!!}
    </label></p>
    <p><label for="mensaje">
      Mensaje
      <textarea class='form-control' name="mensaje">{{old('mensaje')}}</textarea>
      {!! $errors->first('mensaje', '<span class=error>:message</span>')!!}
    </label></p>
    <input class='btn btn-primary' type="submit" value="enviar">
  </form>
  @endif
  @stop
</html>
