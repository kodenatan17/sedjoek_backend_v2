@extends('adminlte::page')
@section('title', 'Edit Stok')
@section('content_header')
<h1 class="m-0 text-dark">Edit Stok</h1>
@stop
@section('content')
    <form action="{{route('stocks.update', $stocks)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class ="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for ="exampleInputName">Nama Produk</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Produk" name="name" value="{{$stocks->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="exampleInputprice" placeholder="Konten Artikel" name="price" value="{{$stocks->price ?? old('price')}}" rows="4">
                        @error('price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class ="form-group">
                        <label for="exampleInputName">Qty</label>
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" id="exampleInputName" placeholder="Dibuat Oleh" name="qty" value="{{$stocks->qty ?? old('qty')}}">
                        @error('qty') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('stocks.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
