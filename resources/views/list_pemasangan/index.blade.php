@extends('adminlte::page')

@section('title','List Pemasangan')

@section('content_header')
<h1 class="m-0 text-dark">List Pemasangan</h1>
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
                            <th>Foto Pemasangan</th>
                            <th>Foto Barang</th>
                            <th>Foto AC Menyala</th>
                            <th>Foto Pipa Terpakai</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($installation as $key => $installation )
                            @if ($installation->status == "INSTALLATION")
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$installation->user->name}}</td>
                                <td>{{$installation->transaction_stock_id}}</td> {{-- name produk --}}
                                <td>{{$installation->transaction_stock_id}}</td> {{-- name installation --}}
                                <td>{{$installation->address}}</td>
                                <td>{{$installation->status}}</td>
                                <td>{{$installation->photo_point_installation}}</td>
                                <th>{{$installation->photo_unit}}</th>
                                <th>{{$installation->photo_ac_on}}</th>
                                <th>{{$installation->photo_pipe_used}}</th>
                                <th>{{$installation->description_install}}</th>
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
