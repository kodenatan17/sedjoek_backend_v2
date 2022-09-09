@extends('adminlte::page')

@section('title','List Gallery')

@section('content_header')
<h1 class="m-0 text-dark">List Gallery</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('gallerys.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Images</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallerys as $key => $gallery )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$gallery->product->name}}</td>
                            <td><div style="max-height: 100px; overflow:hidden;"><img src = " {{ asset('storage/' . $gallery->url) }}" alt="" width="100px"></div></td>
                            <td>
                                <a href="{{route('gallerys.edit', $gallery)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('gallerys.destroy', $gallery)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
