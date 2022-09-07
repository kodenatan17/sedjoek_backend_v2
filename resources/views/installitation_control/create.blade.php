@extends('adminlte::page')
@section('title', 'Kontrol Pemasangan')
@section('content_header')
<h1 class="m-0 text-dark">Kontrol Pemasangan</h1>
@stop
@section('content')
<form action="{{route('installitation_control.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama User</label>
                        <select name="users_id" class="form-control @error('users_id') is-invalid @enderror" id="exampleInputName">
                            <option disabled>-----</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Produk</label>
                        <select name="transaction_stock_id" class="form-control @error('transaction_stock_id') is_invalid @enderror" id="exampleInputName">
                            <option disabled>-----</option>
                            @foreach ($transaction_stock_id as $transaction)
                                <option value="{{$transaction->id}}">{{$transaction->stock_id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputName" placeholder="Alamat Transaksi" name="address" value="{{old('address')}}">
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Transaksi</label>
                        <input type="number" class="form-control @error('total_price') is-invalid @enderror" id="exampleInputName" placeholder="Total Transaksi" name="total_price" value="{{old('total_price')}}">
                        @error('total_price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga Pengiriman</label>
                        <input type="number" class="form-control @error('shipping_price') is-invalid @enderror" id="exampleInputName" placeholder="Harga Pengiriman" name="shipping_price" value="{{old('shipping_price')}}">
                        @error('shipping_price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Status Transaksi</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="exampleInputName">
                            <option disabled>------</option>
                            <option value="SHIPPED">SHIPPED</option>
                            <option value="SHIPPING">SHIPPING</option>
                            <option value="PROCESSING">PROCESSING</option>
                            <option value="PENDING">PENDING</option>
                            <option value="CANCEL">CANCEL</option>
                        </select>
                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Deskripsi Survey</label>
                        <input type="text" class="form-control @error('description_survey') is-invalid @enderror" id="exampleInputName" placeholder="Keterangan Deskripsi Survey" name="description_survey" value="{{old('description_survey')}}">
                        @error('description_survey') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Deskripsi Pemasangan</label>
                        <input type="text" class="form-control @error('description_install') is-invalid @enderror" id="exampleInputName" placeholder="Keterangan Deskripsi Pemasangan" name="description_install" value="{{old('description_install')}}">
                        @error('description_install') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Deskripsi Akhir</label>
                        <input type="text" class="form-control @error('description_finish') is-invalid @enderror" id="exampleInputName" placeholder="Keterangan Deskripsi Akhir Penyelesaian" name="description_finish" value="{{old('description_finish')}}">
                        @error('description_finish') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Upload Foto Lokasi</label>
                        <input type="file" class="form-control @error('photo_location') is-invalid @enderror" id="exampleInputName" name="photo_location" value="{{old('photo_location')}}">
                        @error('photo_location') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Upload Foto Pemasangan</label>
                        <input type="file" class="form-control @error('photo_point_installation') is-invalid @enderror" id="exampleInputName" value="{{old('photo_point_installation')}}">
                        @error('photo_point_installation') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Upload Foto Barang</label>
                        <input type="file" class="form-control @error('photo_unit') is-invalid @enderror" id="exampleInputName" value="{{old('photo_unit')}}">
                        @error('photo_unit') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Upload Foto Dalam Ruangan</label>
                        <input type="file" class="form-control @error('photo_indoor_installation') is-invalid @enderror" id="exampleInputName" value="{{old('photo_indoor_installation')}}">
                        @error('photo_indoor_installation') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Upload Foto Luar Ruangan</label>
                        <input type="file" class="form-control @error('photo_outdoor_installation') is-invalid @enderror" id="exampleInputName" value="{{old('photo_outdoor_installation')}}">
                        @error('photo_outdoor_installation') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Upload Foto AC Menyala</label>
                        <input type="file" class="form-control @error('photo_ac_on') is-invalid @enderror" id="exampleInputName" value="{{old('photo_ac_on')}}">
                        @error('photo_ac_on') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Upload Foto Pipa Terpakai</label>
                        <input type="file" class="form-control @error('photo_pipe_used') is-invalid @enderror" id="exampleInputName" value="{{old('photo_pipe_used')}}">
                        @error('photo_pipe_used') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('installitation_control.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
