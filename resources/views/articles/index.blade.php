@extends('adminlte::page')

@section('title', 'List Artikel')

@section('content_header')
    <h1 class="m-0 text-dark">List Article</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-2">
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
                            @foreach ($article as $key => $article)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->content }}</td>
                                    <td>{{ $article->created_by }}</td>
                                    <td>{{ $article->type }}</td>
                                    <td>
                                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>

                                        <a href="{{ route('articles.destroy', $article) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Hapus
                                        </a>
                                        {{-- <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                        </form> --}}
                                        {{-- <div class="col-2 mr-2">
                                            <button type="button" class="remove-user btn btn-transparent p-0 text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                                </svg>
                                            </button>
                                            <form method="POST" class="delete-user-form"
                                                action="{{ route('articles.destroy', $article->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                            </form>
                                        </div> --}}

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
    <form action="{{ route('articles.destroy', $article->id) }} " id="delete-form" method="post">
        @method('DELETE')
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
    <script>
        $(document).ready(function() {
            $(".remove-user").click(function() {
                var form = $(this).parent().find('form');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    // text: "Anda akan mengeluarkan penerima ini dari dafar penerima",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, Saya Yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
