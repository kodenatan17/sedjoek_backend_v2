@extends('adminlte::page')
@section('title', 'Tambah Gallery')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Gallery</h1>
@stop
@section('content')
<form action="{{route('gallerys.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Produk</label>
                        <select name="product_id" class="form-control @error('product_id') is-invalid @enderror" id="product">
                            <option>-----</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Image gallerys</label>
                        <input type="file" class="form-control @error('url') is-invalid @enderror" id="exampleInputEmail" name="url" value="{{old('url')}}">
                        @error('url') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('gallerys.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
