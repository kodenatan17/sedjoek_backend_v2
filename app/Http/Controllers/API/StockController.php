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
        try {
            $data =  Stock::all();
            if ($data){
                return response()->json($data, 200);
            }else{
                return response()->json($data, 400);
            }
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
        // $data = Stock::all();
        // return response()->json($data);
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
