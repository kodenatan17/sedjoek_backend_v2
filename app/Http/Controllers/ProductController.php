<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\BrandModel;
use App\Models\ProductModel;
use app\Models\CategoryModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = ProductModel::with('category','brand')->get();
        return view('products.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryModel::all();
        $brand = BrandModel::all();
        return view('products.create', compact('categories', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $array = $request->all();
        $product = ProductModel::create($array);
        return redirect()->route('products.index')->with('success_message', 'Berhasil menambahkan Product Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductModel::find($id);
        if (!$product) return redirect()->route('products.index')->with('error_message', 'Product dengan id' . $id . 'tidak ditemukan');
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = ProductModel::find($id)->all();
        $product->save();
        return redirect()->route('products.index')->with('success_message', 'Berhasil mengubah Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRequest $request, $id)
    {
        $product = ProductModel::find($id);
        if ($product) $product->delete();
        return redirect()->route('products.index')->with('success_message', 'Berhasil menghapus Product');
    }
}
