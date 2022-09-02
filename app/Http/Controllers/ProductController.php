<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Item;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = ProductModel::with('category','brand', 'stock')->get();
        return view('products.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = ProductModel::all();
        $categories = CategoryModel::all();
        $brand = BrandModel::all();
        $stock = Stock::all();
        return view('products.create', compact('categories', 'brand', 'stock', 'product'));
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
    public function edit($id = 0)
    {
        $data = ProductModel::find($id);
        return response()->json($data);
        $brand = BrandModel::all();
        $categories = CategoryModel::all();
        $stock = Stock::all();
        if (!$data) return redirect()->route('products.index')->with('error_message', 'Product dengan id' . $id . 'tidak ditemukan');
        // return view('products.edit', compact('brand', 'categories', 'product'));
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
        $product = ProductModel::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->categories_id = $request->categories_id;
        $product->brand_id = $request->brand_id;
        $product->save();
        return redirect()->route('products.index')->with('success_message', 'Berhasil mengubah Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductModel::find($id);
        if ($product) $product->delete();
        return redirect()->route('products.index')->with('success_message', 'Berhasil menghapus Product');
    }

    public function autocomplete(Request $request)
    {
        $data = Item::select("name")
                ->where("name","LIKE","%{$request->input('query')}%")
                ->get();

        return response()->json($data);
    }
}
