@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>File</h5>
            <a href="{{route('files.create')}}" class="btn btn-primary ms-auto" >Agregar</a>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{Session::get('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select usability" name="idUsability" title="idUsability">
                <option value="" selected>Seleccionar un uso</option>
                @livewire('c-b-usability-component')
            </select>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select userHost" name="idUserHost" title="idUserHost">
                <option value="" selected>Seleccionar un usuario</option>
                @livewire('c-b-usuario-component')
            </select>
        </div>
        <div class="container-fluid container-tabla">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Url</th>
                        <th>Description</th>
                        <th>UrlOptional</th>
                        <th>Usability</th>
                        <th>Usuario</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @livewire('file-component')
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Url</th>
                        <th>Description</th>
                        <th>UrlOptional</th>
                        <th>Usability</th>
                        <th>Usuario</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection