@extends('adminlte::page')
@section('title', 'Tambah Stok')
@section('price_header')
<h1 class="m-0 text-dark">Tambah Stok</h1>
@stop
@section('content')
<form action="{{route('stocks.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Produk</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Produk" name="name" value="{{old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="exampleInputName" placeholder="Konten Artikel" name="price" value="{{old('price')}}">
                        @error('price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class ="form-group">
                        <label for="exampleInputName">Qty</label>
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" id="exampleInputName" placeholder="Dibuat Oleh" name="qty" value="{{old('qty')}}">
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
