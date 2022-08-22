@extends('adminlte::page')

@section('title','List Product')

@section('content_header')
<h1 class="m-0 text-dark">List Product</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('products.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Tags</th>
                            <th>Kategori</th>
                            <th>Brand</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $key => $product )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->tags}}</td>
                            <td>{{$product->category['name']}}</td>
                            <td>{{$product->brand['name']}}</td>
                            <td>
                                <a href="{{route('products.edit', $product)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('products.destroy', $product)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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