@extends('adminlte::page')
@foreach ($users as $user)
    {{ $user->name }}
@endforeach
@section('title', 'Administrador')

@section('content_header')
    <h1>Panel Administrativo</h1>
@stop

@section('content')
    <p>Bienvenido al panel administrativo JStock.</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
