@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._messages')
            <div class="page-header">
                <h3>
                    Buscar cliente por ciudad
                    </p>
                    {{ Form::open(['route' => 'clientes', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                        <div class="form-group">
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Ciudad']) }}
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search">Buscar</span>
                        </button>
                    </div>
                    {{ Form::close() }}
                </h3>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Clientes') }}</div>

                <div class="card-body">              
                    @foreach ($clients as $client)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">COD</th>
                                    <th scope="col">Nombre Completo</th>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $client->id}}</td>
                                    <td>{{ $client->name}}</td> 
                                    <td>{{ $client->city->name}}</td>
                                    <td>     
                                        <form action="{{ route('clientes/eliminar',$client->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                         
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="{{ route('clientes/editar',$client->id) }}" class="btn btn-primary">Editar</a>                     
                                            <button type="submit" class="btn btn-danger"onclick="return confirm('¿Deseas eliminar el cliente?')">Eliminar</button>
                         
                                        </form>                         
                                    </td>
                                </tr>                        
                            </tbody>
                        </table>
                    </div>
                    @endforeach     
                    <a href="{{ route('clientes/agregar') }}" class="btn btn-success mt-4 ml-3">  Agregar Cliente </a>
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {!! $clients->links() !!}
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection