@extends('adminlte::page')

@section('title','List Transaksi Preiode')

@section('content_header')
<h1 class="m-0 text-dark">List Transaksi Periode</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(Auth::user()->roles == "ADMIN")
                    <a href="{{route('transaction_periodes.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                @endif
                @if(Auth::user()->roles == "ACCOUNTING ADMIN")
                    <a href="{{route('transaction_periodes.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                @endif
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Transaksi</th>
                            <th>Mulai Pemasanagan</th>
                            <th>Selesai Pemasangan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periode as $key => $periode )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$periode->transaction['status']}}</td>
                            <td>{{$periode->started_at}}</td>
                            <td>{{$periode->finished_at}}</td>
                            <td>
                                @if(Auth::user()->roles == "ADMIN")
                                    <a href="{{route('transaction_periodes.edit', $periode)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('transaction_periodes.destroy', $periode)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Hapus
                                    </a>
                                @endif
                                @if(Auth::user()->roles == "ACCOUNTING ADMIN")
                                    <a href="{{route('transaction_periodes.edit', $periode)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('transaction_periodes.destroy', $periode)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
