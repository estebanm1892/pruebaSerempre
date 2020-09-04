@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">    
                    <form method="POST" action="{{ route('clientes/store') }}">                  
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Nombre del cliente:</label> 
                        <div>
                        <input class="form-control" required="required" name="name" type="text" id="name"> 
                        <br>
                        <div class="form-group">
                            <label for="city_id">Selecciona una ciudad:</label>
                            <select class="form-control" id="city_id" name="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>      
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('clientes') }}" class="btn btn-warning" onclick="return confirm('¿Deseas cancelar?')">Cancelar</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection()