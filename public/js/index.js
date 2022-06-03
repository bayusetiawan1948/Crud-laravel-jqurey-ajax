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
    $.get("http://localhost:8000/read", {}, function (data, status) {
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
