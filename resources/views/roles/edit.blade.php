@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Formulario para Editar Rol</h5>
            <a href="{{route('roles.index')}}" class="btn btn-primary ms-auto" >Volver</a>
        </div>
        <div class="card-body">
            <form action ="{{route('roles.update',$id)}}" method ="POST" enctype="multipart/form-data" id="create">
                @method('PUT')
                @include('roles.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="create">
                Editar
            </button>
        </div>
    </div>
@endsection