@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
    <h1>Panel Administrativo</h1>
@stop

@section('content')
    <p>Bienvenido al panel administrativo Holita <span class="text-red-800">JS</span>tock.</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
