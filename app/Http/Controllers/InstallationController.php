<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\InstallationModel;
use Illuminate\Http\Request;

class InstallationController extends Controller
{
    public function index()
    {
        $installation = InstallationModel::all();
        // dd($installitation);
        return view('list_pemasangan.index', compact('installation'));
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
        $survey = InstallationModel::create($array);
        return redirect()->route('list_pemasangan.index')->with('success_message', 'Berhasil Menambahkan List Pemasangan Baru');
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
        $installation = InstallationModel::find($id);

        if (!$installation) return redirect()->route('list_pemasangan.index')->with('error_message', 'List pemasangan dengan id' . $id . 'tidak ditemukan');
        return view('list_pemasangan.edit', compact('users','transaction_stock_id', 'installation'));
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
        $installation = InstallationModel::find($id);
        $installation->users_id = $request->users_id;
        $installation->transaction_stock_id; // nama produk
        $installation->transaction_stock_id; // nama installation
        $installation->address = $request->address;
        $installation->status = $request->status;

        $installation->save();
        return redirect()->route('list_pemasangan.index')->with('success_message', 'Berhasil Memperbarui List Survey');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $installation = InstallationModel::find($id);
        if ($installation) $installation->delete();
        return redirect()->route('list_pemasangan.index')->with('success_message', 'Berhasil Menghapus Survey');
    }

}
