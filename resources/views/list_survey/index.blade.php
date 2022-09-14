@extends('adminlte::page')

@section('title','List Survey')

@section('content_header')
<h1 class="m-0 text-dark">List Survey</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="dtHorizontalExample" class="table table-sm table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User</th>
                            <th>Nama Produk</th>
                            <th>Nama Teknisi</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Foto Lokasi</th>
                            <th>Foto Dalam Ruangan</th>
                            <th>Foto Luar Ruangan</th>
                            <th>Deskripsi Survey</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey as $key => $survey )
                            @if ($survey->status == "SURVEY")
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$survey->user->name}}</td>
                                <td>{{$survey->transaction_stocks->stocks->name ?? '_'}}</td>
                                <td>{{$survey->technicians->technician_users->name ?? '_'}}</td>
                                <td>{{$survey->address}}</td>
                                <td>{{$survey->status}}</td>
                                <td>{{$survey->photo_location}}</td>
                                <td>{{$survey->photo_indoor_installation}}</td>
                                <td>{{$survey->photo_outdoor_installation}}</td>
                                <td>{{$survey->description_survey}}</td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $(document).ready(function () {
        $('#dtHorizontalExample').DataTable({
            "scrollX": true,
        });
        $('.dataTables_length').addClass('bs-select');
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin menghapus data ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush
