@extends('adminlte::page')

@section('title','Kontrol Pemasangan')

@section('content_header')
<h1 class="m-0 text-dark">Kontrol Pemasangan</h1>
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
                            <th>Deskripsi Survey</th>
                            <th>Deskripsi Pemasangan</th>
                            <th>Deskripsi Akhir</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($installitation as $key => $installitation )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$installitation->user->name}}</td>
                            <td>{{$installitation->transaction_stock_id}}</td> {{-- name produk --}}
                            <td>{{$installitation->address}}</td>
                            <td>{{$installitation->total_price}}</td>
                            <td>{{$installitation->shipping_price}}</td>
                            <td>{{$installitation->status}}</td>
                            <td>{{$installitation->payment}}</td>
                            <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $installitation->photo_location) }}" alt="" width="100px"></div></td>
                            <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $installitation->photo_point_installation) }}" alt="" width="100px"></div></td>
                            <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $installitation->photo_unit) }}" alt="" width="100px"></div></td>
                            <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $installitation->photo_indoor_installation) }}" alt="" width="100px"></div></td>
                            <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $installitation->photo_outdoor_installation) }}" alt="" width="100px"></div></td>
                            <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $installitation->photo_ac_on) }}" alt="" width="100px"></div></td>
                            <td><div style="max-height: 100px; overflow:hidden;"><img src =" {{ asset('storage/' . $installitation->photo_pipe_used) }}" alt="" width="100px"></div></td>
                            <td>{{$installitation->description_survey}}</td>
                            <td>{{$installitation->description_install}}</td>
                            <td>{{$installitation->description_finish}}</td>
                            <td>
                                @if(Auth::user()->roles == "ADMIN")
                                    <a href="{{route('installitation_control.edit', $installitation)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('installitation_control.destroy', $installitation)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Hapus
                                    </a>
                                @endif
                                @if(Auth::user()->roles == "USER")
                                    <a href="{{route('installitation_control.edit', $installitation)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('installitation_control.destroy', $installitation)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Hapus
                                    </a>
                                @endif
                            </td>
                        </tr>
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
