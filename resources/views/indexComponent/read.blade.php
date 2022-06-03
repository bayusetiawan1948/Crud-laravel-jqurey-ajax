<table class="table">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Action</th>
  </tr>
  @foreach ($data as $item)
      <tr>
        <th>{{ $item->id }}</th>
        <th>{{ $item->name }}</th>
        <th>
          <button class="btn btn-warning" onclick="edit({{ $item->id }})">Edit</button>
          <button class="btn btn-danger" onclick="destroy({{ $item->id }})">Delete</button>
        </th>
      </tr>
  @endforeach
</table>