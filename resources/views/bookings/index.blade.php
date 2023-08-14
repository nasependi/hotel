@extends('layout.main')

@section('judul')
    Booking
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Booking</h3>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                    Tambah Booking
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="bookingTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>No Kamar</th>
                                        <th>Nama Kamar</th>
                                        <th>Check In</th>
                                        <th>check Out</th>
                                        <th style="width: 40px">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bookings as $item)
                                        <tr>
                                            <td>{{ 1 }}</td>
                                            <td>{{ $item->no_kamar }}</td>
                                            <td>{{ $item->nama_kamar }}</td>
                                            <td>{{ $item->checkin }}</td>
                                            <td>{{ $item->checkout }}</td>
                                            <td>
                                                <div>
                                                    <a href="/" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $item->id }}">Edit</a>
                                                    <form action="/booking/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="bookingModal{{ $item->id }}" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="bookingModalLabel">Edit Booking {{ $item->nama_kamar }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="/booking/{{ $item->id }}" id="bookingForm">
                                                            @method('put')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="roomNumber" class="form-label">Room Number</label>
                                                                <input type="text" class="form-control" id="roomNumber" name="no_kamar" value="{{ $item->no_kamar }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="roomName" class="form-label">Room Name</label>
                                                                <input type="text" class="form-control" id="roomName" name="nama_kamar" value="{{ $item->nama_kamar }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="checkin" class="form-label">Check-In</label>
                                                                <input type="date" class="form-control" id="checkin" name="checkin" value="{{ $item->checkin }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="checkout" class="form-label">Check-Out</label>
                                                                <input type="date" class="form-control" id="checkout" name="checkout" value="{{ $item->checkout }}" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="6">No data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="container mt-4">
                                <!-- EXAMPLE 1 -->
                                <div class="mb-4">
                                    <h2 class="mb-3">1. All-in-one example</h2>
                                    <div class="alert alert-primary mb-3">
                                        <ul class="mb-0">
                                            <li>Click on an event to move it.</li>
                                            <li>Click on empty space of the timeline to add a new event on predefined position.</li>
                                            <li>Use +- keys to change zooming level.</li>
                                            <li>Use vertical mouse wheel to scroll timeline horizontally.</li>
                                        </ul>
                                    </div>
                                    <div class="mb-2" id="sked1"></div>
                                    <small>
                                        <span class="text-danger">*</span>
                                        To make the example lightweight the timezones in here
                                        are set disregarding the DST, so they may be different
                                        from the actual ones, that's ok.
                                    </small>
                                </div>
                                <!-- EXAMPLE 2 -->
                                <div class="mb-4">
                                    <h2 class="mb-3">2. Deferred rendering demo</h2>
                                    <div class="alert alert-primary mb-3">
                                        See the sources of this example to know how to initialize
                                        the component with its actual rendering postponed. Note
                                        that tzOffset = 0 in this example.
                                    </div>
                                    <div id="sked2"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Add Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/booking" id="bookingForm">
                        @method('post')
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

    <script type="text/javascript">
        // --------------------------- Data --------------------------------
        var locations = [{
                id: '1',
                name: 'San Francisco',
                tzOffset: 7 * 60
            },
            {
                id: '2',
                name: 'Sydney',
                tzOffset: -10 * 60
            },
            {
                id: '3',
                name: 'New York',
                tzOffset: 4 * 60
            },
            {
                id: 'london',
                name: 'London',
                tzOffset: -1 * 60
            },
            {
                id: '5',
                name: 'Copenhagen',
                tzOffset: -2 * 60
            },
            {
                id: '6',
                name: 'Berlin',
                tzOffset: -2 * 60
            },
        ];
        var events = [{
                name: 'Meeting 1',
                location: 'london',
                start: today(4, 15),
                end: today(7, 30)
            },
            {
                name: 'Meeting 2 (ovelapping)',
                location: 'london',
                start: today(6, 30),
                end: today(9, 15)
            },
            {
                name: 'Meeting 3 (ovelapping)',
                location: 'london',
                start: today(9, 0),
                end: today(11, 30)
            },
            {
                name: 'Meeting 4 (ovelapping)',
                location: 'london',
                start: today(7, 45),
                end: today(8, 30)
            },
            {
                name: 'Meeting 5 (ovelapping)',
                location: 'london',
                start: today(8, 0),
                end: today(8, 15)
            },
            {
                name: 'Meeting',
                location: '1',
                start: today(0, 0),
                end: today(1, 30)
            },
            {
                name: 'Meeting',
                location: '5',
                start: today(0, 0),
                end: today(1, 30)
            },
            {
                name: 'Meeting',
                location: '1',
                start: today(10, 0),
                end: today(11, 30)
            },
            {
                name: 'Meeting with custom class',
                location: '2',
                start: yesterday(22, 0),
                end: today(1, 30),
                class: 'custom-class'
            },
            {
                name: 'Meeting just after the previous one',
                location: '2',
                start: today(1, 45),
                end: today(2, 45),
                class: 'custom-class'
            },
            {
                name: 'And another one...',
                location: '2',
                start: today(3, 10),
                end: today(5, 30),
                class: 'custom-class'
            },
            {
                name: 'Disabled meeting',
                location: '3',
                start: yesterday(22, 15),
                end: yesterday(23, 30),
                disabled: true
            },
            {
                name: 'Meeting',
                location: '3',
                start: yesterday(23, 45),
                end: today(1, 30)
            },
            {
                name: 'Meeting that started early',
                location: '6',
                start: yesterday(21, 45),
                end: today(0, 45)
            },
            {
                name: 'Late meeting',
                location: '5',
                start: today(11, 15),
                end: today(13, 45)
            },
        ];
        // -------------------------- Helpers ------------------------------
        function today(hours, minutes) {
            var date = new Date();
            date.setHours(hours, minutes, 0, 0);
            return date;
        }

        function yesterday(hours, minutes) {
            var date = today(hours, minutes);
            date.setTime(date.getTime() - 24 * 60 * 60 * 1000);
            return date;
        }

        function tomorrow(hours, minutes) {
            var date = today(hours, minutes);
            date.setTime(date.getTime() + 24 * 60 * 60 * 1000);
            return date;
        }
        // --------------------------- Example 1 ---------------------------
        var $sked1 = $('#sked1').skedTape({
            caption: 'Cities',
            start: yesterday(22, 0),
            end: today(12, 0),
            showEventTime: true,
            showEventDuration: true,
            scrollWithYWheel: true,
            locations: locations.slice(),
            events: events.slice(),
            maxTimeGapHi: 60 * 1000, // 1 minute
            minGapTimeBetween: 1 * 60 * 1000,
            snapToMins: 1,
            editMode: true,
            timeIndicatorSerifs: true,
            showIntermission: true,
            formatters: {
                date: function(date) {
                    return $.fn.skedTape.format.date(date, 'l', '.');
                },
                duration: function(ms, opts) {
                    return $.fn.skedTape.format.duration(ms, {
                        hrs: 'ч.',
                        min: 'мин.'
                    });
                },
            },
            canAddIntoLocation: function(location, event) {
                return location.id !== 'london';
            },
            postRenderLocation: function($el, location, canAdd) {
                this.constructor.prototype.postRenderLocation($el, location, canAdd);
                $el.prepend('<i class="fas fa-thumbtack text-muted"/> ');
            }
        });
        $sked1.on('event:dragEnded.skedtape', function(e) {
            console.log(e.detail.event);
        });
        $sked1.on('event:click.skedtape', function(e) {
            $sked1.skedTape('removeEvent', e.detail.event.id);
        });
        $sked1.on('timeline:click.skedtape', function(e, api) {
            try {
                $sked1.skedTape('startAdding', {
                    name: 'New meeting',
                    duration: 60 * 60 * 1000
                });
            } catch (e) {
                if (e.name !== 'SkedTape.CollisionError') throw e;
                //alert('Already exists');
            }
        });
        // --------------------------- Example 2 ---------------------------
        var sked2Config = {
            caption: 'Cities',
            start: yesterday(23, 0),
            end: tomorrow(0, 0),
            showEventTime: true,
            showEventDuration: true,
            locations: locations.map(function(location) {
                var newLocation = $.extend({}, location);
                delete newLocation.tzOffset;
                return newLocation;
            }),
            events: events.slice(),
            tzOffset: 0,
            sorting: true,
            orderBy: 'name',
        };
        var $sked2 = $.skedTape(sked2Config);
        $sked2.appendTo('#sked2').skedTape('render');
        //$sked2.skedTape('destroy');
        $sked2.skedTape(sked2Config);
        // --------------------------- Example 3 ---------------------------
        $('#modal1').on('shown.bs.modal', function() {
            $('#sked3').skedTape(sked2Config);
        });
        $('#modal1').on('hidden.bs.modal', function() {
            // This is not necessary, but it always a good idea to do not
            // take processing time for elements that don't show.
            $('#sked3').skedTape('destroy');
        });

        var $skedTabBtn = $('a[data-toggle="tab"][href="#sked-tab"]');
        $skedTabBtn.on('shown.bs.tab', function(e) {
            $('#sked4').skedTape(sked2Config);
        });
        $skedTabBtn.on('hidden.bs.tab', function(e) {
            $('#sked4').skedTape('destroy');
        });
    </script>

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
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/jquery.skedtape.js') }}"></script>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('css/jquery.skedtape.css') }}">
@endsection
