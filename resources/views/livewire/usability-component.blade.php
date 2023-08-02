@if(isset($respuesta))
    @foreach ($respuesta as $resp)
        <tr id="{{$resp->idUsability}}">
            <td>{{$resp->name}}</td>
            <td class="button_actions">
                <a href="{{route('usabilities.edit',$resp->idUsability)}}" class="btn btn-success">Editar</a>
                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->idUsability}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                <form action="{{route('usabilities.destroy',$resp->idUsability)}}" method ="POST" id="delete_{{$resp->idUsability}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
@endif