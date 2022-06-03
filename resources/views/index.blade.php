<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<title>Document</title>
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-8">
        <h1>belajar crud laravel</h1>
        <button class="btn btn-primary" onclick="create()">Tambah Product</button>
        <div id="read" class="mt-3"></div>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judul-modal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="page" class="p2"></div>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script>
    $.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    read();
});

//read
function read() {
    $.get("{{ url('read') }}", {}, function (data, status) {
        $("#read").html(data);
    });
}

//create
function create() {
    $.get("{{ url('create') }}", {}, function (data, status) {
        $("#judul-modal").html("Create Product");
        $("#page").html(data);
        $("#product").modal("show");
    });
}

//store
function store() {
    const name = $("#name").val();
    $.ajax({
        type: "post",
        url: "{{ url('store') }}",
        data: "name=" + name,
        success: function (data) {
            $(".btn-close").click();
            read();
        },
    });
}

//edit
function edit(id) {
    $.get("{{ url('edit') }}/" + id, {}, function (data, status) {
        // console.log(data)
        $("#judul-modal").html("Edit Product");
        $("#page").html(data);
        $("#product").modal("show");
    });
}

//update
function update(id) {
    const name = $("#name").val();
    $.ajax({
        type: "put",
        url: "{{ url('update') }}/" + id,
        data: "name=" + name,
        success: function (data) {
            $(".btn-close").click();
            read();
        },
    });
}

//destroy
function destroy(id) {
    confirm("apakah yakin mau dihapus ?");
    $.ajax({
        type: "delete",
        url: "{{ url('destroy') }}/" + id,
        success: function (data) {
            $(".btn-close").click();
            read();
        },
    });
}

  </script>
</body>
</html>