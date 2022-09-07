@extends('adminlte::page')
@section('title', 'Tambah Product')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Product</h1>
@stop
@section('content')
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Nama Produk</label>
                            <select name="name" class="form-control @error('name') is-invalid @enderror" id="product" onchange="">
                                <option disabled>-----</option>
                                @foreach ($stock as $stock)
                                    <option value="{{ $stock->id }}">{{ $stock->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputName">Nama Produk</label>
                            <select name="price" class="form-control @error('price') is-invalid @enderror"
                                id="price">
                                <option disabled>-----</option>
                                    <option value="{{ old('price') }}">{{ $stock->price }}</option>
                            </select>
                        </div> --}}
                        {{-- </div>{{$produck->$stock->price}} --}}
                        {{-- <div class="form-group">
                            <label for="exampleInputName">Nama Produk</label>
                            <select name="price" class="form-control @error('price') is-invalid @enderror" id="exampleInputName">
                                <option>-----</option>
                                @foreach ($product as $produck)
                                @if ($produck->name == null)
                                    <option value="{{$produck->$stock->price}}">{{$produck->$stock->price}}</option>
                                @else
                                    <option value="{{$produck->$stock}}">{{$produck->$stock}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputName">Harga Produk</label>
                            <input class="form-control @error('price') is-invalid @enderror" id="price"
                                placeholder="Harga Produk" name="price" value="{{ old('price') }}" rows="4">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Deskripsi Product</label>
                            <input class="form-control @error('description') is-invalid @enderror" id="exampleInputName"
                                placeholder="Deskripsi Produk" name="description" value="{{ old('description') }}"
                                rows="4">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tags Product</label>
                            <select name="tags" class="form-control @error('tags') is-invalid @enderror"
                                id="exampleInputName">
                                <option value="Promo">Promo</option>
                                <option value="New Arrival">New Arrival</option>
                                <option value="Best Seller">Best Seller</option>
                            </select>
                            @error('tags')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Kategori AC</label>
                            <select name="categories_id" class="form-control @error('categories_id') is-invalid @enderror"
                                id="exampleInputName">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Brand AC</label>
                            <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror"
                                id="exampleInputName">
                                @foreach ($brand as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('products.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
    @push('js')
        <script>
            $(document).ready(function() {
                $("#product").on('change', (event) => {
                    getId(event.target.value).then(id => {
                        $('#price').val(id.price);
                    })
                })

                async function getId(id) {
                    let response = await fetch('/api/ProductController/' + id)
                    let data = await response.json();

                    return data;
                }
            });
        </script>
    @endpush
