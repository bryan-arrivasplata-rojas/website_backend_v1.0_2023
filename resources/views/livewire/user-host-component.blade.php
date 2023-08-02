@if(isset($respuesta))
    @foreach ($respuesta as $resp)
        <tr id="{{$resp->idUserHost}}">
            <td>{{$resp->user->name}}: {{$resp->user->email}}</td>
            <td>{{$resp->host->url}}</td>
            <td class="button_actions">
                <a href="{{route('userhosts.edit',$resp->idUserHost)}}" class="btn btn-success">Editar</a>
                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->idUserHost}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                <form action="{{route('userhosts.destroy',$resp->idUserHost)}}" method ="POST" id="delete_{{$resp->idUserHost}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
@endif