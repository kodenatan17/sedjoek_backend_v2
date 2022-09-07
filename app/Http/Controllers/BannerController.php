<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\BannerModel;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = BannerModel::all();

        return view('banners.index', ['banner' => $banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $array = $request->only([
            'urlImages' => 'image|file|max:1024'
        ]);
        if($request->file('urlImages')){
            $array['urlImages'] = $request->file('urlImages')->store('post-images');
        }
        $banner = BannerModel::create($array);
        return redirect()->route('banners.index')->with('success_message', 'Data Banner berhasil ditambahkan');
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
        $banner = BannerModel::find($id);
        if (!$banner) return redirect()->route('brands.index')->with('error message', 'Banner dengan id' . $id . 'tidak ditemukan');
        return view('banners.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $banner = BannerModel::find($id);
        $banner->urlImages = $request->urlImages;
        if($request->file('urlImages')){
            $banner['urlImages'] = $request->file('urlImages')->store('post-images');
        }
        dd($banner);
        $banner->save();
        return redirect()->route('banners.index')->with('success_message', 'Berhasil mengubah Banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = BannerModel::find($id);
        if($banner) $banner->delete();
        return redirect()->route('banners.index')->with('success_message','Data Banner berhasil dihapus');
    }
}
