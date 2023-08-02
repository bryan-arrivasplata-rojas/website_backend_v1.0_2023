@csrf
<div class="row">
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
    <div class="col-12"><div class="form-group">
        <label form="">Host</label>
        <select class="form-select filter-select" name="idHost" title="idHost" required>
            <option value="">Seleccionar un host</option>
            @foreach ($host as $resp)
                @if(isset($respuesta))
                    @if($resp->idHost == $respuesta->data->idHost)
                        <option value="{{$resp->idHost}}" selected>{{$resp->url}}</option>
                    @else{
                        <option value="{{$resp->idHost}}">{{$resp->url}}</option>
                    }
                    @endif
                @else
                    <option value="{{$resp->idHost}}">{{$resp->url}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>