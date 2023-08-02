@if(isset($respuesta))
    @foreach ($respuesta as $resp)
        <tr id="{{$resp->idFile}}">
            <td>{{$resp->name}}</td>
            <td>{{$resp->url}}</td>
            <td>{{$resp->description}}</td>
            <td>{{$resp->urlOptional}}</td>
            <td>{{$resp->usability->name}}</td>
            <td>{{$resp->userhost->user->email}}</td>
            <td>{{$resp->position}}</td>
            <td class="button_actions">
                <a href="{{route('files.edit',$resp->idFile)}}" class="btn btn-success">Editar</a>
                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->idFile}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                <form action="{{route('files.destroy',$resp->idFile)}}" method ="POST" id="delete_{{$resp->idFile}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
@endif