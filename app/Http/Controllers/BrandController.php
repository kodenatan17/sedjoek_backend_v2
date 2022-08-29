<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\BrandModel;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = BrandModel::all();

        return view('brands.index', ['brand' => $brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $array = $request->only([
            'name',
        ]);
        $brand = BrandModel::create($array);
        return redirect()->route('brands.index')->with('success_message', 'Berhasil Menambahkan Brand Baru');
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
        $brand = BrandModel::find($id);
        if (!$brand) return redirect()->route('brands.index')->with('error_message', 'Brand dengan id' . $id . 'tidak ditemukan');
        return view('brands.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $brand = BrandModel::find($id);
        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('brands.index')->with('success_message', 'Berhasil mengubah Brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = BrandModel::find($id);
        if ($brand) $brand->delete();
        return redirect()->route('brands.index')->with('success_message', 'Berhasil menghapus Brand');
    }
}
