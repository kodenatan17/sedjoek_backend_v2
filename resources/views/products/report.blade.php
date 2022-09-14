@extends('adminlte::page')

@section('title', 'List Product')

@section('content_header')
    <h1 class="m-0 text-dark">List Product</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                                    class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="start_date" placeholder="Start Date" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                                    class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="end_date" placeholder="End Date">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button id="filter" class="btn btn-primary btn-sm">Filter</button>
                                <button id="reset" class="btn btn-warning btn-sm">Reset</button>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <!-- Table -->
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-stripped display nowrap" id="report" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Price</th>
                                                    <th>Stok</th>
                                                    <th>Tags</th>
                                                    <th>Kategori</th>
                                                    <th>Brand</th>
                                                    <th>Tipe</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">

    </div>
@stop
@push('js')
    {{-- <script>
        function filter() {
            document.getElementById("#endDate").value + '/' + document.getElementById("#endDate").value;
        }
        $("#myHref").on('click', function() {
            document.getElementById('#startDate').value +
                    '/' + document.getElementById('#endDate').value
            window.location = "/reportForm/";
            console.log(window);
        });
    </script> --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script>
        // $(function() {
        //     $("#start_date").datepicker({
        //         "dateFormat": "yy-mm-dd"
        //     });
        //     $("#end_date").datepicker({
        //         "dateFormat": "yy-mm-dd"
        //     });
        // });
        // Fetch report
        function fetch(start_date, end_date) {
            $.ajax({
                url: "{{ route('products/report') }}",
                type: "GEt",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function(data) {
                    // Datatables
                    var i = 1;
                    $('#report').DataTable({
                        "data": data.products,
                        // buttons
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        "buttons": [
                            'excel', 'pdf', 'print'
                        ],
                        // responsive
                        "responsive": true,
                        "columns": [
                            {
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "name",
                            },
                            {
                                "data": "price",
                                "render": function(data, type, row, meta) {
                                    return `Rp.${row.price}`;
                                }
                            },
                            {
                                "data": "stock"
                            },
                            {
                                "data": "tags",
                            },
                            {
                                "data": "categories_id"
                            },
                            {
                                "data": "brand_id"
                            },
                            {
                                "data": "type"
                            },
                            {
                                "data": "created_at",
                                "render": function(data, type, row, meta) {
                                    return moment(row.created_at).format('DD-MM-YYYY');
                                }
                            }
                        ]
                    });
                }
            });
        }
        fetch();
        // Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                alert("Both date required");
            } else {
                $('#report').DataTable().destroy();
                fetch(start_date, end_date);
            }
        });
        // Reset
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#start_date").val(''); // empty value
            $("#end_date").val('');
            $('#report').DataTable().destroy();
            fetch();
        });
    </script>
@endpush
