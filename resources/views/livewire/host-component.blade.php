@if(isset($respuesta))
    @foreach ($respuesta as $resp)
        <tr id="{{$resp->idHost}}">
            <td>{{$resp->url}}</td>
            <td class="button_actions">
                <a href="{{route('hosts.edit',$resp->idHost)}}" class="btn btn-success">Editar</a>
                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->idHost}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                <form action="{{route('hosts.destroy',$resp->idHost)}}" method ="POST" id="delete_{{$resp->idHost}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
@endif
