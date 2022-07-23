@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Category</h1>
@stop

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="cold-md-11">
            <h1 class="text-center mb-5">
                <i class="fa fa-list"> Categorias</i>
            </h1>

            <a class="btn btn-primary  mb-1" href="{{url('/formCategory')}}">
                <i class="fas fa-user-plus"> AGREGAR</i>
            </a>
            <form class="form-inline my-2 my-lg-0 float-right" role="search" action="{{route('listaCategory')}}" method="get">

                <input class="form-control me-2" type="text" placeholder="Buscar" aria-label="Search" name="texto" class="form-control" value="{{$texto}}" >

                <input type="submit" class="btn btn-outline-success"  value="Buscar" >
            </form>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>

                </tr>
                </thead>
                <tbody class="table-group-divider">
                @if(count($category)<=0)
                    <tr>
                        <td colspan="8">No hay Resultados</td>
                    </tr>
                @else


                    @foreach($category as $categorys)
                        <tr>

                            <td>{{$categorys->id}}</td>
                            <td>{{$categorys->description}}</td>

                            <td>

                                <div class="btn-group">

                                    <a href="{{route('editformCategory', $categorys->id)}}" class="btn btn-primary mb-3 mr-2">
                                        <i class="fas fa-pencil-alt"> Editar</i>
                                    </a>

                                    <form action="{{route('deleteCategory', $categorys->id)}}" method="POST" class="Alert-eliminar">
                                        @csrf @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"> Eliminar</i>
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>

            </table>
        </div>

        <!--paginas-->
        {{ $category->onEachSide(3)->links() }}

    </div>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Mensaje de Modificacion-->
    @if(session('categoryModificado')=='Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La categoria fue Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <!--Mensaje de Guardado-->
    @if(session('categoriaGuardado')=='Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La categoria se Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif


    <!--Mensaje de Eliminado-->
    @if(session('categoryEliminado')=='Eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se elimino la categoria exitosamente',
                'success'
            )
        </script>
    @endif
    <script>
        $('.Alert-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro que desea eliminar la categoria?',
                text: "Si presiona si se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

    @if(session('alerta')=='si')

        <script>
            Swal.fire({
                title: 'No se puede eliminar la categoria ',
                text:'Esta categoria ya esta ligado a  un customer, por ende es imposible eliminarlo',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif

@stop
