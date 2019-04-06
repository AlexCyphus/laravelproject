<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Blog</title>
    </head>
    <style>
      a {
        text-decoration-line: none;
        text-decoration-color: black;
      }

      .active {
        font-weight: bold;
      }

      a:visited {color: black;}

      .error {
        color: red;
        font-size: 12px;
      }

    </style>
    <body>
      <?php
      function activeMenu($url) {
        return request()->is($url) ? 'active' : '';
      } ?>

      <nav>
        <a href='{{route('home')}}' class="{{activeMenu('/')}}"> Inicio </a>
        <a href='{{route('saludos', 'Invitado')}}'  class="{{activeMenu('saludos*')}}" > Saludo </a>
        <a href='{{route('mensajes.create')}}' class="{{activeMenu('mensajes/create')}}" > Contactos </a>
        <a href='{{route('mensajes.index')}}' class="{{activeMenu('mensajes')}}" > Mensajes </a>
        @if(auth()->guest())
        <a href='/login' class="{{activeMenu('login')}}" > Login </a>
        @endif
        @if(auth()->check())
        <a href='/logout'> Cerrar sesion de {{ auth()->user()->name }} </a>
        @endif
      </nav>

      <!-- Contenido es el nombre de la seccion que queremos mostrar aca -->
      @yield('contenido')

      <footer> Copyright 2019 </footer>
    </body>
</html>
