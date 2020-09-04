@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Ciudades') }}</div>

                <div class="card-body">              
                    @foreach ($cities as $city)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">COD</th>
                                    <th scope="col">Nombre de la Ciudad</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $city->id}}</td>
                                    <td>{{$city->name}}</td>    
                                    <td >     
                                        <form action="{{ route('ciudades/eliminar',$city->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                         
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="{{ route('ciudades/editar',$city->id) }}" class="btn btn-primary">Editar</a>                     
                                            <button type="submit" class="btn btn-danger"onclick="return confirm('¿Deseas eliminar una ciudad?, esta puede tener clientes registrados')">Eliminar</button>
                         
                                        </form>                         
                                    </td>
                                </tr>                        
                            </tbody>
                        </table>
                    </div>
                    @endforeach     
                    <a href="{{ route('ciudades/agregar') }}" class="btn btn-success mt-4 ml-3">  Agregar Ciudad </a>
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {!! $cities->links() !!}
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection