@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Nombre Completo</label>
        <input type="name" class="form-control" name="name" value="{{(isset($respuesta))?$respuesta->data->name: old('name')}}" placeholder="Escribir el nombre completo" maxlength="255" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Email</label>
        <input type="email" class="form-control" name="email" value="{{(isset($respuesta))?$respuesta->data->email: old('email')}}" placeholder="Escribir el email" maxlength="255" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Password</label>
        <input type="password" class="form-control" name="password" value="" placeholder="Escribir el password" maxlength="255" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Role</label>
        <select class="form-select filter-select" name="idRol" title="idRol" required>
            <option value="">Seleccionar un rol</option>
            @foreach ($role as $resp)
                @if(isset($respuesta))
                    @if($resp->idRol == $respuesta->data->idRol)
                        <option value="{{$resp->idRol}}" selected>{{$resp->description}}</option>
                    @else{
                        <option value="{{$resp->idRol}}">{{$resp->description}}</option>
                    }
                    @endif
                @else
                    <option value="{{$resp->idRol}}">{{$resp->description}}</option>
                @endif
                
            @endforeach
        </select>
    </div>
</div>