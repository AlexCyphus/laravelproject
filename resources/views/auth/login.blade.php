@extends('layout')

@section('contenido')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <h1>Login</h1>
    <form class="" action="/login" method="post">
      {!! csrf_field() !!}
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="" value="Entrar">
    </form>
  <br>
  </body>
</html>
@stop
