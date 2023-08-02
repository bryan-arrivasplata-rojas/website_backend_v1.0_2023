@if(isset($respuesta))
    @foreach ($respuesta as $resp)
        <tr id="{{$resp->id}}">
            <td>{{$resp->name}}</td>
            <td>{{$resp->email}}</td>
            <td>{{$resp->role->description}}</td>
            <td class="button_actions">
                <a href="{{route('users.edit',$resp->id)}}" class="btn btn-success">Editar</a>
                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->id}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                <form action="{{route('users.destroy',$resp->id)}}" method ="POST" id="delete_{{$resp->id}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
@endif