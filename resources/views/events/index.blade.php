@extends('adminlte::page')

@section('title','List Banner')

@section('content_header')
<h1 class="m-0 text-dark">List Banner</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('banners.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Url</th>
                            <th>Created By</th>
                            <th>Images</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $key => $event )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$event->title}}</td>
                            <td>{{$event->content}}</td>
                            <td>{{$event->url}}</td>
                            <td>{{$event->created_by}}</td>
                            <td><img src = "/temp_events/ {{$event->urlImages}}" width="100px"></td>
                            <td>
                                <a href="{{route('events.edit', $event)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('events.destroy', $event)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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