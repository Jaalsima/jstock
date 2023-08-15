@extends('adminlte::page')

@section('title', 'Administrador')

{{-- @section('content_header')
    <h1 class="bg-red-400">Panel Administrativo</h1>
@stop --}}

@section('content')

    <div class="tw-button">
        hola
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Primer div principal -->
                <div class="p-4 mb-4 text-white bg-primary">
                    <div class="row">
                        <div class="p-3 col-md-3 tw-button">
                            <!-- Contenido del primer div interior -->

                        </div>
                        <div class="p-3 col-md-3 bg-success">
                            <!-- Contenido del segundo div interior -->
                        </div>
                        <div class="p-3 col-md-3 bg-warning">
                            <!-- Contenido del tercer div interior -->
                        </div>
                        <div class="p-3 col-md-3 bg-info">
                            <!-- Contenido del cuarto div interior -->
                        </div>
                    </div>
                </div>

                <!-- Segundo div principal -->
                <div class="p-4 bg-secondary">
                    <div class="row">
                        <div class="p-3 col-md-6 bg-info">
                            <!-- Contenido del primer div interior -->
                        </div>
                        <div class="p-3 col-md-6 bg-warning">
                            <!-- Contenido del segundo div interior -->
                        </div>
                    </div>
                </div>

                <!-- Tercer div principal -->
                <div class="p-4 mt-4 text-white bg-dark">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Contenido del div interior -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    @vite(['resources/css/tailwind-components.css', 'resources/js/app.js'])
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
