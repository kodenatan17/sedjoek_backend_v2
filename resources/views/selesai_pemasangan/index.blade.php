@extends('adminlte::page')

@section('title','Selesai Pemasangan')

@section('content_header')
<h1 class="m-0 text-dark">Selesai Pemasangan</h1>
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
                            <th>Total Harga</th>
                            <th>Harga Pengiriman</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Foto Lokasi</th>
                            <th>Foto Pemasangan</th>
                            <th>Foto Barang</th>
                            <th>Foto Dalam Ruangan</th>
                            <th>Foto Luar Ruangan</th>
                            <th>Foto AC Menyala</th>
                            <th>Foto Pipa Terpakai</th>
                            <th>Deskripsi Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($finish as $key => $finish )
                            @if ($finish->status == "FINISH")
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$finish->user->name}}</td>
                                <td>{{$finish->transaction_stock_id}}</td> {{-- name produk --}}
                                <td>{{$finish->transaction_stock_id}}</td> {{-- name FINISH --}}
                                <td>{{$finish->address}}</td>
                                <td>{{$finish->status}}</td>
                                <td>{{$finish->payment}}</td>
                                <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $finish->photo_location) }}" alt="" width="100px"></div></td>
                                <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $finish->photo_point_installation) }}" alt="" width="100px"></div></td>
                                <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $finish->photo_unit) }}" alt="" width="100px"></div></td>
                                <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $finish->photo_indoor_installation) }}" alt="" width="100px"></div></td>
                                <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $finish->photo_outdoor_installation) }}" alt="" width="100px"></div></td>
                                <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $finish->photo_ac_on) }}" alt="" width="100px"></div></td>
                                <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $finish->photo_pipe_used) }}" alt="" width="100px"></div></td>
                                <td>{{$finish->description_survey}}</td>
                                <td>{{$finish->description_install}}</td>
                                <td>{{$finish->description_finish}}</td>
                                </td>
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
