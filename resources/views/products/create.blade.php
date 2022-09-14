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
                        {{-- <div class="form-group">
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
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputName">Nama Produk</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Nama Produk" name="name" value="{{ old('name') }}" rows="4">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Harga Produk</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                                placeholder="Harga Produk" name="price" value="{{ old('price') }}" rows="4">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Stok</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                                placeholder="Stok" name="stock" value="{{ old('stock') }}" rows="4">
                            @error('stock')
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
                            <label for="exampleInputName">Tipe</label>
                            <select name="type" class="form-control @error('type') is-invalid @enderror" id="exampleInputName">
                                <option disabled>------</option>
                                <option value="AC">AC</option>
                                <option value="PIPE">Pipa</option>
                                <option value="CABLE">Kabel</option>
                                <option value="TOOLS">Alat - Alat</option>
                            </select>
                            @error('type') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Deskripsi Product</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="exampleInputName"
                                placeholder="Deskripsi Produk" name="description" value="{{ old('description') }}"
                                rows="4"></textarea>
                            @error('description')
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
