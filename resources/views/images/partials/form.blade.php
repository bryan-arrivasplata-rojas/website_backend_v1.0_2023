@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Name</label>
        <input type="text" class="form-control" name="name" value="{{(isset($respuesta))?$respuesta->data->name: old('name')}}" placeholder="Escribir  el nombre" maxlength="200" required>
    </div><br>
    <input type="file" name="image" class="form-control" id="image" required>
</div>