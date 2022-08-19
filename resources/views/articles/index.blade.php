@extends('adminlte::page')

@section('title','List Artikel')

@section('content_header')
<h1 class="m-0 text-dark">List Article</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('articles.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Content</th>
                            <th>Created By</th>
                            <th>Type</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($article as $key => $article )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->content}}</td>
                            <td>{{$article->created_by}}</td>
                            <td>{{$article->type}}</td>
                            <td>
                                <a href="{{route('articles.edit', $article)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('articles.destroy', $article)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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