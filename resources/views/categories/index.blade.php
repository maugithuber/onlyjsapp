@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('status') == "success")
                    <div class="alert alert-success">
                        <strong>Exito!</strong> Categoria registrada correctamente
                    </div>
                @elseif(session('status')== "error" )
                    <div class="alert alert-danger">
                        <strong>Error!</strong> No se pudo registrar la categoria
                    </div>
                @endif
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-3">
                                <b>CATEGORIAS</b>
                            </div>

                            <div class="col-5">
                                <form class="form-inline" >
                                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="escribe un nombre...">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </div>
                            <div class="col-4">
                                <button type="button" data-toggle="modal" href="#myModal" class="btn btn-outline-primary btn-block">Nueva</button>

                            </div>
                        </div>


                    </div>


                    <div class="card-body">


                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>

                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" href="">editar</a>
                                        <a class="btn btn-sm btn-outline-danger" href="">eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    {{ $categories->links() }}
                    </div>
                 

                </div>
            </div>
        </div>
    </div>






    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{route('savecategory')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="..."required>
                        </div>



                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
@endsection
