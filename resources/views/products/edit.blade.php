@extends('adminlte::page')
@section('title', 'Edit Product')
@section('content_header')
<h1 class="m-0 text-dark">Edit Product</h1>
@stop
@section('content')
<form action="{{route('products.update', $product)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Produk</label>
                        <select name="name_id" class="form-control @error('name_id') is-invalid @enderror" id="product" onchange="auto()">
                            <option disabled>----- Nama Produk -----</option>
                            @foreach ($stock as $stock)
                                <option value="{{ $stock->id }}">{{ $stock->name_id }}</option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Product</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Harga Produk" name="price" value="{{$product->price ?? old('price')}}" readonly>
                        @error('price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Stok</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Harga Produk" name="stock" value="{{$product->stock ?? old('stock')}}" readonly>
                        @error('stock') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Brand AC</label>
                        <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror" id="exampleInputName">
                            <option disabled>------</option>
                            @foreach ($brand as $brand)
                            <option value= "{{$brand->id}}" {{ $brand->id == $product->brand_id ? 'selected' : '' }} >{{$brand->name}}</option>
                            @endforeach
                        </select>
                        @error('brand_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Kategori AC</label>
                        <select name="categories_id" class="form-control @error('categories_id') is-invalid @enderror" id="exampleInputName">
                            <option disabled>-----</option>
                            @foreach ($categories as $category)
                            <option value= "{{$category->id}}" {{ $category->id == $product->categories_id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('categories_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Tags Product</label>
                        <select name="tags" class="form-control @error('tags') is-invalid @enderror" id="exampleInputName">
                            <option disabled>------</option>
                            <option value="Promo" {{$product->tags == 'Promo' ? 'selected' : '' }} >Promo</option>
                            <option value="New Arrival" {{$product->tags == 'New Arrival' ? 'selected' : ''}} >New Arrival</option>
                            <option value="Best Seller" {{$product->tags == 'Best Seller' ? 'selected' : ''}} >Best Seller</option>
                        </select>
                        @error('tags') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Deskripsi</label>
                        <input class="form-control @error('description') is-invalid @enderror" id="exampleInputName" placeholder="Deskripsi Produk" name="description" value="{{$product->description ?? old('description')}}" rows="4">
                        @error('description') <span class="text-danger">{{$message}}</span> @enderror
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
    @push('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function auto(){
                var id = $('#product').val();
                var url = '{{ route('autocomplete', ':id') }}';
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(response)
                    {
                        if (response !== null) {
                            $('#price').val(response.price);
                            $('#stock').val(response.qty);
                        }
                    }
                });
            };
        </script>
    @endpush
