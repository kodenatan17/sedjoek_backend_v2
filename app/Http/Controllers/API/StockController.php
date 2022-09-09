<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $price = $request->input('price');
        $qty = $request->input('qty');

        $show_products = $request->input('show_products');
        $show_transaction = $request->input('show_transaction');

        if ($id) {
            $stock = Stock::find($id);
            if ($stock) {
                return ResponseFormatter::success($stock, 'Data Kategori berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data Kategori tidak ada', 404);
            }
        }
        $stock = Stock::query();

        if ($name) {
            $stock->where('name', 'like', '%' . $name . '%');
        }
        if ($price) {
            $stock->where('price', 'like', '%' . $price . '%');
        }
        if ($qty) {
            $stock->where('qty', 'like', '%' . $qty . '%');
        }
        if ($show_products) {
            $stock->with('products');
        }
        if ($show_transaction) {
            $stock->with('transaction');
        }
        return ResponseFormatter::success(
            $stock->paginate($limit),
            'Data Kategori berhasil diambil'
        );
        $data = Stock::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'qty' => 'required',
        ]);

        $newComment = new Stock([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'qty' => $request->get('qty'),
        ]);

        $newComment->save();

        return response()->json($newComment);
    }

    public function update(Request $request, $id)
    {
        $data = Stock::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);

        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->qty = $request->get('qty');

        $data->save();

        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Stock::findOrFail($id);
        $data->delete();

        return response()->json($data::all());
    }
}
