<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Blog</title>
    </head>
    <link rel="stylesheet" href="/css/app.css">
    <body>
      <?php
      function activeMenu($url) {
        return request()->is($url) ? 'active' : '';
      } ?>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Aprendible</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a href='{{route('home')}}' class="{{activeMenu('/')}} nav-link"> Inicio </a>
              </li>
              <li class="nav-item active">
                <a href='{{route('saludos', 'Invitado')}}'  class="{{activeMenu('saludos*')}} nav-link" > Saludo </a>
              </li>
              <li class="nav-item active">
                <a href='{{route('mensajes.create')}}' class="{{activeMenu('mensajes/create')}} nav-link" > Contactos </a>
              </li>

              @if(auth()->check())
              <li class="nav-item active {{activeMenu('mensajes*')}}">
                <a href='{{route('mensajes.index')}}' class="nav-link" > Mensajes </a>
              </li>

              @if(auth()->user()->hasRoles(['admin']))
                <li class="nav-item active {{activeMenu('messages*')}}">
                  <a href='{{route('usuarios.index')}}' class="nav-link" > Usuarios </a>
                </li>
              @endif

              @endif

            </ul>

            <ul class="nav navbar-nav navbar-right">

              @if(auth()->guest())
                <li class="nav-item active">
                  <a href='/login' class="{{activeMenu('login')}} nav-link" > Login </a>
                </li>
              @endif

              @if(auth()->check())
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/logout">Cerrar sesion</a>
                  </div>
                </li>
              @endif

            </ul>
          </div>
        </nav>
      </div>


      <!-- Contenido es el nombre de la seccion que queremos mostrar aca -->
      <div class="container">
        @yield('contenido')

        <footer> Copyright 2019 </footer>
      </div>
      <script src="/js/app.js"></script>
    </body>
</html>
