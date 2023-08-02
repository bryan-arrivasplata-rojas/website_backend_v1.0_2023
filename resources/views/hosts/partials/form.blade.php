@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Url</label>
        <input type="text" class="form-control" name="url" value="{{(isset($respuesta))?$respuesta->data->url: old('url')}}" placeholder="Escribir la url" maxlength="200" required>
    </div>
</div>