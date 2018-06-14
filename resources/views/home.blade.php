@extends('layouts.app')

@section('title')
    Cuentas
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @if (session('status') == "success")
                <div class="alert alert-success">
                    <strong>Exito!</strong> Cuenta registrada correctamente
                </div>
        @elseif(session('status')== "error" )
                <div class="alert alert-danger">
                     <strong>Error!</strong> No se pudo registrar la cuenta
                </div>
        @endif

            <div class="card">
                <div class="card-header ">
                    <div class="row">
                            <div class="col-4 ">
                                <b>CUENTAS </b>
                            
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ver por
                                    </button>
                                    <div class="dropdown-menu">
                                    @foreach($categories as $category)
                                        <a class="dropdown-item" href="#">{{$category->name}}</a>
                                    @endforeach
                                    </div>
                                    </div>
                                </div>
    
                            <div class="col-lg-5 ">
                                <form class="form-inline" >
                                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="escribe un nombre...">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </div>

                            <div class="col-lg-3 " >
                                <button type="button" data-toggle="modal" href="#myModal" class="btn  btn-outline-primary btn-block">Nueva</button>
                            </div>
                    </div>
                </div>

                <div class="card-body">
                
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts as $account)
                            <tr>
                                <td>{{$account->name}}</td>
                                <td>{{$account->category->name}}</td>
                                <td>
                                    <a class="btn btn-sm btn-outline-dark" href="{{route('viewaccount',$account->id)}}">Ver detalle</a>
                                </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                        {{ $accounts->links() }}
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
                <h5 class="modal-title" id="exampleModalLabel">Nueva cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{route('storeaccount')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name"  name="name" placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="identifier">Identificador</label>
                        <input type="email" class="form-control" id="identifier"  name="identifier" placeholder="name@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Seleccione una categoria</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="extra">informacion extra</label>
                        <textarea class="form-control" id="extra" name="extra" rows="3" required ></textarea >
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
