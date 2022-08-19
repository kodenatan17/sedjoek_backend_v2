@extends('adminlte::page')
@section('title', 'Edit Product')
@section('content_header')
<h1 class="m-0 text-dark">Edit Product</h1>
@stop
@section('content')
<form action="{{route('products.update', $product)}}" method="post">
    @method_field('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Product</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Produk" name="name" value="{{$product->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Product</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="exampleInputName" placeholder="Harga Produk" name="price" value="{{$product->price ?? old('price')}}">
                        @error('price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Product</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleInputName" placeholder="Deskripsi Produk" name="description" value="{{$product->description ?? old('description')}}" rows="4">
                        @error('description') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Tags Product</label>
                        <select name="tags" class="form-controller @error('tags') is-invalid @enderror" id="exampleInputName">
                            <option disabled>------</option>
                            <option value="{{$product->tags ?? old('tags')}}">Promo</option>
                            <option value="{{$product->tags ?? old('tags')}}">New Arrival</option>
                            <option value="{{$product->tags ?? old('tags')}}">Best Seller</option>
                        </select>
                        @error('tags') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Kategori AC</label>
                        <select name="categories_id" class="form-controller @error('categories_id') is-invalid @enderror" id="exampleInputName">
                            <option disabled>-----</option>    
                            @foreach ($categories as $category)
                            <option value= "{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('categories_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Brand AC</label>
                        <select name="brand_id" class="form-controller @error('brand_id') is-invalid @enderror" id="exampleInputName">
                            <option disabled>------</option>    
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