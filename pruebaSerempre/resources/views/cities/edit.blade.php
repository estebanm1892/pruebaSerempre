@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">    
                    <form method="POST" action="{{ route('ciudades/update', $city->id) }}">  
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">Nombre:</label> 
                        <div>
                        <input class="form-control" required="required" name="name" type="text" id="name" value="{{ $city->name }}"> 
                        <br>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('ciudades') }}" class="btn btn-warning" onclick="return confirm('¿Deseas cancelar?')">Cancelar</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection()