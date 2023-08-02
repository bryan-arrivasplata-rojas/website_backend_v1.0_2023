@if(isset($respuesta))
    @foreach ($respuesta as $resp)
        <tr id="{{$resp->idRol}}">
            <td>{{$resp->description}}</td>
            <td class="button_actions">
                <a href="{{route('roles.edit',$resp->idRol)}}" class="btn btn-success">Editar</a>
                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->idRol}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                <form action="{{route('roles.destroy',$resp->idRol)}}" method ="POST" id="delete_{{$resp->idRol}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
@endif
