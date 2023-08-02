@if(isset($respuesta))
    @foreach ($respuesta as $resp)
        <tr id="{{$resp->idProfile}}">
            <td>{{$resp->user->name}}</td>
            <td>{{$resp->user->email}}</td>
            <td>{{$resp->number}}</td>
            <td>{{$resp->birthday}}</td>
            <td style="text-align: center;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$resp->idProfile}}" style="text-align: center;">
                    Descripción de perfil
                </button>
                <div class="modal fade" id="staticBackdrop{{$resp->idProfile}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Description</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{$resp->description}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="button_actions">
                <a href="{{route('profiles.edit',$resp->idProfile)}}" class="btn btn-success">Editar</a>
                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->idProfile}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                <form action="{{route('profiles.destroy',$resp->idProfile)}}" method ="POST" id="delete_{{$resp->idProfile}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
@endif