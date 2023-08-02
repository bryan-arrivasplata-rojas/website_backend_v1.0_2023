@foreach ($userhost as $resp)
    <option value="{{$resp->user->email}}">{{$resp->user->email}}</option>
@endforeach