@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Name</label>
        <input type="text" class="form-control" name="name" value="{{(isset($respuesta))?$respuesta->data->name: old('name')}}" placeholder="Escribir la name" maxlength="100" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Url</label>
        <input type="text" class="form-control" name="url" value="{{(isset($respuesta))?$respuesta->data->url: old('url')}}" placeholder="Escribir la url" maxlength="200" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Description</label>
        <textarea type="text" class="form-control" name="description" aria-label="With textarea" placeholder="Escribir la description" maxlength="500" rows="4" required>{{(isset($respuesta))?$respuesta->data->description: old('description')}}</textarea>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">UrlOptional</label>
        <input type="text" class="form-control" name="urlOptional" value="{{(isset($respuesta))?$respuesta->data->urlOptional: old('urlOptional')}}" placeholder="Escribir la urlOptional" maxlength="200" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Usability</label>
        <select class="form-select filter-select" name="idUsability" title="idUsability" required>
            <option value="">Seleccionar un uso</option>
            @foreach ($usability as $resp)
                @if(isset($respuesta))
                    @if($resp->idUsability == $respuesta->data->idUsability)
                        <option value="{{$resp->idUsability}}" selected>{{$resp->name}}</option>
                    @else{
                        <option value="{{$resp->idUsability}}">{{$resp->name}}</option>
                    }
                    @endif
                @else
                    <option value="{{$resp->idUsability}}">{{$resp->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Usuario</label>
        <select class="form-select filter-select" name="idUserHost" title="idUserHost" required>
            <option value="">Seleccionar un usuario</option>
            @foreach ($userhost as $resp)
                @if(isset($respuesta))
                    @if($resp->idUserHost == $respuesta->data->idUserHost)
                        <option value="{{$resp->idUserHost}}" selected>{{$resp->user->name}}: {{$resp->user->email}}</option>
                    @else{
                        <option value="{{$resp->idUserHost}}">{{$resp->user->name}}: {{$resp->user->email}}</option>
                    }
                    @endif
                @else
                    <option value="{{$resp->idUserHost}}">{{$resp->user->name}}: {{$resp->user->email}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Position</label>
        <input type="number" class="form-control" name="position" value="{{(isset($respuesta))?$respuesta->data->position: old('position')}}" placeholder="Escribir la position" maxlength="3">
    </div>
</div>