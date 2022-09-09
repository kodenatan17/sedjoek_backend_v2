<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\FinishModel;
use Illuminate\Http\Request;
use App\Http\Requests\FinishRequest;

class FinishController extends Controller
{
    public function index()
    {
        $finish = FinishModel::all();
        // dd($installitation);
        return view('selesai_pemasangan.index', compact('finish'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->all();
        $survey = FinishModel::create($array);
        return redirect()->route('selesai_pemasangan.index')->with('success_message', 'Berhasil atau Selesai Pemasangan');
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
        $users = User::all();
        $transaction_stock_id = Stock::all();
        $finish = FinishModel::find($id);

        if (!$finish) return redirect()->route('selesai_pemasangan.index')->with('error_message', 'List pemasangan dengan id' . $id . 'tidak ditemukan');
        return view('selesai_pemasangan.edit', compact('users','transaction_stock_id', 'finish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinishRequest $request, $id)
    {
        $finish = FinishModel::find($id);
        $finish->users_id = $request->users_id;
        $finish->transaction_stock_id; // nama produk
        $finish->transaction_stock_id; // nama finish
        $finish->address = $request->address;
        $finish->status = $request->status;
        $finish->save();

        return redirect()->route('selesai_pemasangan.index')->with('success_message', 'Berhasil Memperbarui List Pemasangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finish = FinishModel::find($id);
        if ($finish) $finish->delete();
        return redirect()->route('selesai_pemasangan.index')->with('success_message', 'Berhasil Menghapus List Pemasangan');
    }

}
