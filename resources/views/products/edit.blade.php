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
                        <label for="exampleInputName">Nama Product</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Produk" name="name" value="{{$product->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Product</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Harga Produk" name="price" value="{{$product->price ?? old('price')}}">
                        @error('price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Stok</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" placeholder="Harga Produk" name="stock" value="{{$product->stock ?? old('stock')}}">
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
                        <label for="exampleInputName">Tipe</label>
                        <select name="type" class="form-control @error('type') is-invalid @enderror"
                            id="exampleInputName">
                            <option disabled>------</option>
                            <option value="AC" {{ $product->type == 'AC' ? 'selected' : '' }}>AC</option>
                            <option value="PIPE" {{ $product->type == 'PIPE' ? 'selected' : '' }}>Pipe</option>
                            <option value="CABLE" {{ $product->type == 'CABLE' ? 'selected' : '' }}>Kabel</option>
                            <option value="TOOLS" {{ $product->type == 'TOOLS' ? 'selected' : '' }}>Alat - Alat</option>
                        </select>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleInputName" placeholder="Deskripsi Produk" name="description" rows="4">{{$product->description ?? old('description')}}</textarea>
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
