<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @extends('layout')
  @section('contenido')
    <h1> saludo {{$nombre}}</h1>

    <ul>
    @forelse($consolas as $consola)
      <li> {{$consola}} </li>
    @empty
      <h3> No tienes ningun consolas </h3>
    @endforelse
    </ul>

  @if(count($consolas) === 1)
    <p> Solo tienes UNA consola :) </p>
  @elseif(count($consolas) > 1)
    <p> Tienes varias consolas :) </p>
  @endif
  @stop
</html>
