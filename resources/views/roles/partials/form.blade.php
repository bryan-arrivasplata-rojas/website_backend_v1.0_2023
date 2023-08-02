@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Description</label>
        <input type="text" class="form-control" name="description" value="{{(isset($respuesta))?$respuesta->data->description: old('description')}}" placeholder="Escribir la descripción del rol" maxlength="200" required>
    </div>
</div>