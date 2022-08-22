@extends('adminlte::page')

@section('title','List Transaksi Detail')

@section('content_header')
<h1 class="m-0 text-dark">List Transaksi Detail</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('transaction_details.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Product Name</th>
                            <th>Transaction Status</th>
                            <th>Quantity</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction_details as $key => $transaction_details )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$transaction_details->user['name']}}</td>
                            <td>{{$transaction_details->product['name']}}</td>
                            <td>{{$transaction_details->transaction['status']}}</td>
                            <td>{{$transaction_details->quantity}}</td>
                            <td>
                                <a href="{{route('transaction_details.edit', $transaction_detail)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('transaction_details.destroy', $transaction_detail)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Hapus
                                </a>
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