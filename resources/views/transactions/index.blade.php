@extends('adminlte::page')

@section('title','List Transaksi')

@section('content_header')
<h1 class="m-0 text-dark">List Transaksi</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(Auth::user()->roles == "ADMIN")
                    <a href="{{route('transactions.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                @endif
                @if(Auth::user()->roles == "ACCOUNTING ADMIN")
                    <a href="{{route('transactions.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                @endif
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User</th>
                            <th>Alamat</th>
                            <th>Total Harga</th>
                            <th>Harga Pengiriman</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $key => $transaction )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$transaction->user['name']}}</td>
                            <td>{{$transaction->address}}</td>
                            <td>{{$transaction->total_price}}</td>
                            <td>{{$tranasacion->shipping_price}}</td>
                            <td>{{$tranasacion->status}}</td>
                            <td>{{$tranasacion->payment}}</td>
                            <td>
                                @if(Auth::user()->roles == "ADMIN")
                                    <a href="{{route('transactions.edit', $brand)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('transactions.destroy', $brand)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Hapus
                                    </a>
                                @endif
                                @if(Auth::user()->roles == "ACCOUNTING ADMIN")
                                    <a href="{{route('transactions.edit', $brand)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('transactions.destroy', $brand)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
    $('#example2').DataTable({
        "responsive": true,
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
