<?php

namespace App\Http\Controllers;

use App\Models\GalleryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = GalleryModel::with('product')->get();
        return view('gallerys.index', compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = ProductModel::all();
        // dd($products);
        return view('gallerys.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'product_id',
            'url' => 'image|file|max:1024'
        ]);
        if($request->file('url')){
            $data['url'] = $request->file('url')->store('gallery');
        }
        $gallery = GalleryModel::create($data);
        return redirect()->route('gallerys.index')->with('success_massage', 'Data Gallery Berhasil ditambahkan');
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
        $product = ProductModel::all();
        $gallery = GalleryModel::find($id);
        if (!$gallery) return redirect()->route('gallerys.index')->with('error message', 'Banner dengan id' . $id . 'tidak ditemukan');
        return view('gallerys.edit', compact('gallery', 'product'));
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
        $gallery = GalleryModel::find($id);
        $gallery->url = $request->url;
        if($request->file('url')){
            $data['url'] = $request->file('url')->store('gallery');
        }
        $gallery->save();
        return redirect()->route('gallerys.index')->with('success_message', 'Berhasil mengubah Banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = GalleryModel::find($id);
        if($gallery) $gallery->delete();
        return redirect()->route('gallerys.index')->with('success_message','Data Banner berhasil dihapus');
    }
}
