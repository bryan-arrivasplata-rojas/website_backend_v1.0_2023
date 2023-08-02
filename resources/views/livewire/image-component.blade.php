@if(isset($respuesta))
    @foreach ($respuesta as $resp)
        <tr id="{{$resp->idImage}}">
            <td>{{$resp->name}}</td>
            <td>{{$resp->url}}</td>
            <td class="button_actions">
                @if(!isset($respuesta))
                    <a href="{{route('images.edit',$resp->idImage)}}" class="btn btn-success">Editar</a>
                @endif
                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->idImage}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                <form action="{{route('images.destroy',$resp->idImage)}}" method ="POST" id="delete_{{$resp->idImage}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
@endif