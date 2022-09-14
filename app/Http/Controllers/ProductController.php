<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\ProductRequest;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\Stock;
use Illuminate\Http\Request;
use DataTables;
use App\Item;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::with('category','brand')->get();
        return view('products.index', compact('products'));
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
        return view('products.create', compact('categories', 'brand', 'product'));
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
        $brand = BrandModel::all();
        $categories = CategoryModel::all();
        if (!$product) return redirect()->route('products.index')->with('error_message', 'Product dengan id' . $id . 'tidak ditemukan');
        return view('products.edit', compact('brand', 'categories', 'product'));
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
        $product->tags = $request->tags;
        $product->stock = $request->stock;
        $product->type = $request->type;
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

    public function autocomplete($id = 0)
    {
        $data = Stock::find($id);
        return response()->json($data);
    }

    public function reportForm()
    {
        $products = ProductModel::with('category','brand', 'stocks')->get();
        return view('products.report', compact('products'));
    }

    public function report(Request $request)
    {
        if ($request->ajax()) {
            // $model = ProductModel::with('stocks');
            //     return Datatables::eloquent($model)
            //     ->addColumn('users', function (ProductModel $product) {
            //         return $product->stocks->name;
            //     })
            //     ->toJson();
            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $products = ProductModel::with('category','brand')->whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $products = ProductModel::latest()->get();
                }
            } else {
                $products = ProductModel::latest()->get();
            }

            return response()->json([
                'products' => $products
            ]);
        } else {
            abort(403);
        }
    }
}
