@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">              
                    @foreach ($users as $user)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">COD</th>
                                    <th scope="col">Nombre del usuario</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->id}}</td>
                                    <td>{{$user->name}}</td>    
                                    <td >     
                                        <form action="{{ route('usuarios/eliminar',$user->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                         
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="{{ route('usuarios/editar',$user->id) }}" class="btn btn-primary">Editar</a>                     
                                            <button type="submit" class="btn btn-danger"onclick="return confirm('¿Deseas eliminar un usuario?, esta puede tener clientes registrados')">Eliminar</button>
                         
                                        </form>                         
                                    </td>
                                </tr>                        
                            </tbody>
                        </table>
                    </div>
                    @endforeach                         
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {!! $users->links() !!}
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection