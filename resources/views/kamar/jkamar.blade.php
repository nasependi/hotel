@extends('layout.main')

@section('judul')
    Jenis Kamar
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Jenis Kamar</h3>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Jenis Kamar</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Jenis Kamar</th>
                                            <th>Harga Kamar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jkamar as $jk)
                                            <tr>
                                                <td>{{ $jk->id }}</td>
                                                <td>{{ $jk->jenis_kamar }}</td>
                                                <td>{{ $jk->harga_kamar }}</td>
                                                <td>
                                                    <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#editModal{{ $jk->id }}" data-id="{{ $jk->id }}" data-jenis="{{ $jk->jenis_kamar }}" data-harga="{{ $jk->harga_kamar }}">Edit</button>
                                                    <button class="btn btn-danger btn-delete" data-id="{{ $jk->id }}">Hapus</button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editModal{{ $jk->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Jenis Kamar</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="editForm">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="hidden" id="edit_id" name="edit_id" value="{{ $jk->id }}">
                                                                <div class="mb-3">
                                                                    <label for="edit_jenis_kamar" class="form-label">Jenis Kamar</label>
                                                                    <input type="text" class="form-control" id="edit_jenis_kamar" name="jenis_kamar" value="{{ old('jenis_kamar') ?? $jk->jenis_kamar }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="edit_harga_kamar" class="form-label">Harga Kamar</label>
                                                                    <input type="number" class="form-control" id="edit_harga_kamar" name="harga_kamar" step="0.01" value="{{ old('harga_kamar') ?? $jk->harga_kamar }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary" id="updateBtn">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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


    <!-- Modal Tambah Jenis Kamar -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Jenis Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jenis_kamar" class="form-label">Jenis Kamar</label>
                            <input type="text" class="form-control" id="jenis_kamar" name="jenis_kamar" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga_kamar" class="form-label">Harga Kamar</label>
                            <input type="number" class="form-control" id="harga_kamar" name="harga_kamar" step="0.01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Jenis Kamar -->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#createForm").on("submit", function(event) {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/jkamar",
                    data: $(this).serialize(),
                    success: function(response) {
                        $("#createModal").modal("hide");
                        location.reload();
                    },
                });
            });

            $("#editForm").on("submit", function(event) {
                event.preventDefault();

                let id = $("#edit_id").val();

                $.ajax({
                    type: "PUT",
                    url: `/jkamar/${id}`,
                    data: $(this).serialize(),
                    success: function(response) {
                        $("#editModal").modal("hide");
                        location.reload();
                    },
                });
            });

            // Delete action
            $(".btn-delete").on("click", function() {
                let id = $(this).data("id");
                let csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token from the meta tag
                $.ajax({
                    type: "DELETE",
                    url: `/jkamar/${id}`,
                    data: {
                        _token: csrfToken // Include the CSRF token in the request data
                    },
                    success: function(response) {
                        location.reload();
                    },
                });
            });
        });
    </script>
@endsection
