<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    /** @var  StockRepository */
    private $stockRepository;
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $stocks = Stock::all();
    //    dd($stock);
       return view('stocks.index', compact('stocks'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('stocks.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $array = $request->only([
           'name', 'price', 'qty'
       ]);
       $stock = Stock::create($array);
       return redirect()->route('stocks.index')->with('success_message', 'Berhasil Menambahkan stock Baru');
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
       $stocks = Stock::find($id);
       if (!$stocks) return redirect()->route('stocks.index')->with('error_message', 'stock dengan id' . $id . 'tidak ditemukan');
       return view('stocks.edit', compact('stocks'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       $stock = Stock::find($id);
       $stock->name = $request->name;
       $stock->price = $request->price;
       $stock->qty = $request->qty;
       $stock->save();
       return redirect()->route('stocks.index')->with('success_message', 'Berhasil mengubah artikel');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $stocks = Stock::find($id);
       if ($stocks) $stocks ->delete();
       return redirect()->route('stocks.index')->with('success_message', 'Berhasil menghapus artikel');
   }

}
