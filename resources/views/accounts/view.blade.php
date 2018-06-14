@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header text-center">
                        <b>CUENTAS</b>
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opciones
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" data-toggle="modal" href="#myModal">Editar</a>
                                <a class="dropdown-item" data-toggle="modal" href="#eliminar">Eliminar</a>
                                {{--<a class="dropdown-item" href="#">Reporte</a>--}}
                            </div>
                        </div>

                        {{--<button type="button" data-toggle="modal" href="#myModal" class="btn btn-primary btn-outline-dark pull-right">Nueva</button>--}}

                    </div>

                    <div class="card-body">
                        @if (session('status'))

                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>

                        @endif



                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name"  name="name" placeholder="{{$account->name}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="identifier">Identificador</label>
                                <input type="email" class="form-control" id="identifier"  name="identifier" placeholder="{{$account->identifier}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="{{$account->password}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="{{$account->description}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Categoria</label>
                                <input type="text" class="form-control" id="category_id" name="category_id" placeholder="{{$account->category->name}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="extra">informacion extra</label>
                                <textarea class="form-control" id="extra" name="extra" rows="3" placeholder="{{$account->extra}}" readonly></textarea >
                            </div>



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
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar cuenta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{route('storeaccount')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name"  name="name" placeholder="{{$account->name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="identifier">Identificador</label>
                            <input type="email" class="form-control" id="identifier"  name="identifier" placeholder="{{$account->identifier}}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="{{$account->password}}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="{{$account->description}}" required>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Seleccione una categoria</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="1">{{$category->name}}</option>
                                @endforeach
                            </select>


                        </div>

                        <div class="form-group">
                            <label for="extra">informacion extra</label>
                            <textarea class="form-control" id="extra" name="extra" placeholder="{{$account->extra}}" rows="3"></textarea >
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>






    <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection
