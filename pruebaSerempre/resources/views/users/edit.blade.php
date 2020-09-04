@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">    
                    <form method="POST" action="{{ route('usuarios/update', $user->id) }}">                  
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Nombre del Usuario:</label> 
                        <div>
                        <input class="form-control" required="required" name="name" type="text" id="name" value="{{ $user->name }}"> 
                        <br>                        
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="{{ route('usuarios') }}" class="btn btn-warning" onclick="return confirm('¿Deseas cancelar?')">Cancelar</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection()