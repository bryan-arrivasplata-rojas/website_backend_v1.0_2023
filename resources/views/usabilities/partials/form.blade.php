@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Name</label>
        <input type="text" class="form-control" name="name" value="{{(isset($respuesta))?$respuesta->data->name: old('name')}}" placeholder="Escribir la name" maxlength="100" required>
    </div>
</div>