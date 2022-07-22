@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Category</h1>
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


                <div class="card border-success">
                    <form action="{{ route('Category.save')}}" method="POST" enctype="multipart/form-data" class="alerta">
                        @csrf

                        <div class="card-header border-success text-center text-white" style="background-color: #196F3D"; >AGREGAR CATEGORY</div>

                        <div class="card-body" style="background-color: #D4EFDF;">

                            <div class="row form-group">
                                <label for="" class="col-2">Description</label>
                                <input type="text" name="description" class="form-control col-md-9">
                            </div>


                            <div class="row form-group">
                                <button type="submit" class="btn btn col-md-9 offset-2 text-dark mb-2" style="background-color: #58D68D;" >
                                    <i class="fas fa-plus">  Guardar</i>
                                </button>

                                <a class="btn btn-outline-secondary col-md-9 offset-2 text-dark" href="{{url('/curso')}}" role="button">
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('alerta')=='si')

        <script>
            Swal.fire({
                title: 'No se pudo agregar la Category',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif

    @if(session('alertaQery')=='no')

        <script>
            Swal.fire({
                title: 'No se pudo agregar la category',
                text:'Es un error de Base de datos',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif
@stop
