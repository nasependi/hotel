<!DOCTYPE html>
<html>
<head>
    <title>Booking List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Booking List</h2>
        <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
            Add Booking
        </button>
        <table class="table table-bordered" id="bookingTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Room Number</th>
                    <th>Room Name</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Add Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm">
                        @csrf
                        <div class="mb-3">
                            <label for="roomNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="roomNumber" name="no_kamar" required>
                        </div>
                        <div class="mb-3">
                            <label for="roomName" class="form-label">Room Name</label>
                            <input type="text" class="form-control" id="roomName" name="nama_kamar" required>
                        </div>
                        <div class="mb-3">
                            <label for="checkin" class="form-label">Check-In</label>
                            <input type="date" class="form-control" id="checkin" name="checkin" required>
                        </div>
                        <div class="mb-3">
                            <label for="checkout" class="form-label">Check-Out</label>
                            <input type="date" class="form-control" id="checkout" name="checkout" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $("#bookingTable").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('bookings.data') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'no_kamar', name: 'no_kamar' },
                    { data: 'nama_kamar', name: 'nama_kamar' },
                    { data: 'checkin', name: 'checkin' },
                    { data: 'checkout', name: 'checkout' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false },
                ],
            });

            // Handle form submission via Ajax
            $("#bookingForm").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('bookings.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (response) {
                        if (response.booking) {
                            // Close the modal
                            $("#bookingModal").modal("hide");

                            // Clear form fields
                            $("#bookingForm")[0].reset();

                            // Reload DataTable
                            table.ajax.reload();

                            // Show success message (optional)
                            alert(response.message);
                        } else {
                            alert("Failed to add booking.");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("An error occurred while adding the booking.");
                    },
                });
            });
        });
    </script>
</body>
</html>
