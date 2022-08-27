@extends('adminlte::page')
@section('title', 'Tambah Product')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Product</h1>
@stop
@section('content')
<form action="{{route('products.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Product</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Produk" name="name" value="{{old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Product</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="exampleInputName" placeholder="Harga Produk" name="price" value="{{old('price')}}">
                        @error('price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Deskripsi Product</label>
                        <input class="form-control @error('description') is-invalid @enderror" id="exampleInputName" placeholder="Deskripsi Produk" name="description" value="{{old('description')}}" rows="4">
                        @error('description') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Tags Product</label>
                        <select name="tags" class="form-control @error('tags') is-invalid @enderror" id="exampleInputName">
                            <option value="{{old('tags')}}">Promo</option>
                            <option value="{{old('tags')}}">New Arrival</option>
                            <option value="{{old('tags')}}">Best Seller</option>
                        </select>
                        @error('tags') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Kategori AC</label>
                        <select name="categories_id" class="form-control @error('categories_id') is-invalid @enderror" id="exampleInputName">
                            @foreach ($categories as $category)
                                <option value= "{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('categories_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Brand AC</label>
                        <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror" id="exampleInputName">
                            @foreach ($brand as $brand)
                                <option value= "{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                        @error('brand_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('products.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
