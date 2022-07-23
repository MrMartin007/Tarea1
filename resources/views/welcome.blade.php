@extends('adminlte::page')

@section('title', 'Tarea1')

@section('content_header')
    <h1>Universidad Mariano Galvez</h1>
    <h1>de Guatemala</h1>



@stop

@section('content')
    <div class="galeria" >
            <div class="ima" >
                <img class="m" src="https://umg.edu.gt/assets/umg.png">
            </div>
    </div>

    <h1>Martin Alexander Lopez Castro </h1>
    <h2>0909-17-9198</h2>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .m{
            width: 30%;
            height: auto;
            margin-left: 30%;
        }

        h1{
            height: 10px;
            height: auto;
            margin-left: 26%;
        }
        h2{
            height: 10px;
            height: auto;
            margin-left: 40%;
        }

        </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
