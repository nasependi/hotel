@extends('layout.main')

@section('judul')
    Kamar
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Kamar</h3>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Kamar</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Kamar</th>
                                            <th>Jenis Kamar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kamar as $k)
                                        <tr>
                                            <td>{{ $k->id }}</td>
                                            <td>{{ $k->nama_kamar }}</td>
                                            <td>{{ $k->jenis_kamar }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-edit" data-id="{{ $k->id }}" data-nama="{{ $k->nama_kamar }}" data-jenis="{{ $k->jenis_kamar }}">Edit</button>
                                                <button class="btn btn-danger btn-delete" data-id="{{ $k->id }}">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Tambah Kamar -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <div class="mb-3">
                        <label for="nama_kamar" class="form-label">Nama Kamar</label>
                        <input type="text" class="form-control" id="nama_kamar" name="nama_kamar" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kamar" class="form-label">Jenis Kamar</label>
                        <input type="text" class="form-control" id="jenis_kamar" name="jenis_kamar" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="createBtn">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Kamar -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="mb-3">
                        <label for="edit_nama_kamar" class="form-label">Nama Kamar</label>
                        <input type="text" class="form-control" id="edit_nama_kamar" name="edit_nama_kamar" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_jenis_kamar" class="form-label">Jenis Kamar</label>
                        <input type="text" class="form-control" id="edit_jenis_kamar" name="edit_jenis_kamar" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="updateBtn">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Tambah Kamar
        $("#createBtn").click(function () {
            $.ajax({
                type: "POST",
                url: "{{ route('kamar.store') }}",
                data: $("#createForm").serialize(),
                success: function (response) {
                    $("#createModal").modal("hide");
                    location.reload();
                },
            });
        });

        // Edit Kamar
        $(".btn-edit").click(function () {
            let id = $(this).data("id");
            let nama_kamar = $(this).data("nama");
            let jenis_kamar = $(this).data("jenis");

            $("#edit_id").val(id);
            $("#edit_nama_kamar").val(nama_kamar);
            $("#edit_jenis_kamar").val(jenis_kamar);

            $("#editModal").modal("show");
        });

        $("#updateBtn").click(function () {
            let id = $("#edit_id").val();

            $.ajax({
                type: "PUT",
                url: `kamar/${id}`,
                data: $("#editForm").serialize(),
                success: function (response) {
                    $("#editModal").modal("hide");
                    location.reload();
                },
            });
        });

        // Hapus Kamar
        $(".btn-delete").click(function () {
            let id = $(this).data("id");

            $.ajax({
                type: "DELETE",
                url: `kamar/${id}`,
                success: function (response) {
                    location.reload();
                },
            });
        });
    });
</script>
@endsection
