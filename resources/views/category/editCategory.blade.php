@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Category</h1>
@stop
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">


                <!--Validacion de errores-->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                <div class="card border-primary">
                    <form action="{{ route('editCategory', $category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')

                        <div class="card-header border-primary text-center text-white" style="background-color: #21618C;" >MODIFICAR CATEGORIA</div>

                        <div class="card-body" style="background-color: #D6EAF8;">

                            <div class="row form-group">
                                <label for="" class="col-2">Descripcion</label>
                                <input type="text" name="description" class="form-control col-md-9" value="{{$category->description}}">
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-primary text-dark col-md-9 offset-2 mb-2" style="background-color: #5499C7;">
                                    <i class="fas fa-undo"> Modificar</i>
                                </button>

                                <a class="btn btn-outline-secondary col-md-9 offset-2 text-dark" href="{{url('/category')}}" role="button">
                                    <i class="far fa-hand-point-left"> Regresar</i>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
