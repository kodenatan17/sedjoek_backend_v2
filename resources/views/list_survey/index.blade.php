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
                            <th>Nama Survey</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey as $key => $survey )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$survey->user->name}}</td>
                            <td>{{$survey->transaction_stock_id}}</td> {{-- name produk --}}
                            <td>{{$survey->transaction_stock_id}}</td> {{-- name survey --}}
                            <td>{{$survey->address}}</td>
                            <td>{{$survey->status}}</td>
                            <td>
                                @if(Auth::user()->roles == "ADMIN")
                                    <a href="{{route('survey.edit', $survey)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('survey.destroy', $survey)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Hapus
                                    </a>
                                @endif
                                @if(Auth::user()->roles == "USER")
                                    <a href="{{route('survey.edit', $survey)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('survey.destroy', $survey)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
