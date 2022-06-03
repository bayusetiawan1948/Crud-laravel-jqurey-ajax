
<div class="p2">
  <div class="form-group">
    <label for="name">Product name :</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}" placeholder="nama product">
  </div>
  <div class="form-group mt-2">
    <button class="btn btn-success" onclick="update({{ $data->id }})">Update</button>
  </div>
</div>