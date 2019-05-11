@extends('layout')

@section('contenido')
  <h1>{{ $user-> name }}</h1>
  <table class='table'>
    <tr>
      <th>Nombre:</th>
      <td>{{$user->name}}</td>
    </tr>
    <tr>
      <th>Email:</th>
      <td>{{$user->email}}</td>
    </tr>
    <tr>
      <th>Roles:</th>
      <td>
        {{ $user->roles->pluck('display_name')->implode(' & ') }}
      </td>
    </tr>
  </table>

  @can('edit', $user)
  <a class="btn btn-info" href="{{route('usuarios.edit', $user->id)}}" role="button">Editar</a>
  @endcan

  @can('destroy', $user)
  <form style= "display:inline" method="post" action="{{ route('usuarios.destroy', $user->id) }}">
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <button class="btn btn-danger" type="submit">Eliminar</button>
  </form>
  @endcan

@stop
