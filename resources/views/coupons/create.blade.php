@extends('adminlte::page')
@section('title', 'Tambah Coupon')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Coupon</h1>
@stop
@section('content')
    <form action="{{ route('coupons.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Pilih Kupon</label>
                            <br>
                            <span class="mr-2"><input type="radio" name="coupon_option" id="manualCoupon" value="Manual">Manual</span>
                            <span><input type="radio" name="coupon_option" id="automaticCoupon" value="Automatic">Automatic</span>
                        </div>
                        <div class="form-group" id="couponField">
                            <label for="exampleInputName">Kode Kupon</label>
                            <input type="text" class="form-control @error('coupon_code') is-invalid @enderror"
                                id="exampleInputName" placeholder="Kode Kupon" name="coupon_code"
                                value="{{ old('coupon_code') }}">
                            @error('coupon_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nama Product</label><br>
                            <select name="products_id[]"
                                class="selectpicker form-control @error('products_id') is-invalid @enderror"
                                id="exampleInputName" multiple data-live-search="true">
                                <option disabled>-----</option>
                                @foreach ($products as $product)
                                    {{-- <option value="{{ $product->id }}">{{ $product->name }}</option> --}}
                                    <option value="{{ $product->id }}"
                                        @if (in_array($product->id, old('products_id', []))) selected="selected" @endif>{{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('coupons.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>

        </div>
    @stop
    @push('js')
        <script>
            $('#manualCoupon').click(function() {
                $('#couponField').show();
            });
            $('#automaticCoupon').click(function() {
                $('#couponField').hide();
            });
        </script>
        $('.selectpicker').selectpicker();
        <script type="text/javascript" src="{{ asset('vendor/select/js/bootstrap-select.min.js') }}"></script>
    @endpush
    @push('css')
        <link href="{{ asset('vendor/select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    @endpush
