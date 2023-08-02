@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Number</label>
        <input type="text" class="form-control" name="number" value="{{(isset($respuesta))?$respuesta->data->number: old('number')}}" placeholder="Escribir el numero" maxlength="50" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Birthday</label>
        <input type="text" class="form-control" name="birthday" value="{{(isset($respuesta))?$respuesta->data->birthday: old('birthday')}}" placeholder="Escribir el cumpleaños" maxlength="100" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Description</label>
        <textarea type="text" class="form-control" name="description" aria-label="With textarea" placeholder="Escribir la descripción del perfil" maxlength="500" rows="4" required>{{(isset($respuesta))?$respuesta->data->description: old('description')}}</textarea>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Usuario</label>
        <select class="form-select filter-select" name="id" title="id" required>
            <option value="">Seleccionar un usuario</option>
            @foreach ($user as $resp)
                @if(isset($respuesta))
                    @if($resp->id == $respuesta->data->id)
                        <option value="{{$resp->id}}" selected>{{$resp->name}}: {{$resp->email}}</option>
                    @else{
                        <option value="{{$resp->id}}">{{$resp->name}}: {{$resp->email}}</option>
                    }
                    @endif
                @else
                    <option value="{{$resp->id}}">{{$resp->name}}: {{$resp->email}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>