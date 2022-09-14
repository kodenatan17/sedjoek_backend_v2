<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryModel::all();

        return view('categories.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $array = $request->only([
            'name',
        ]);
        CategoryModel::create($array);
        return redirect()->route('categories.index')->with('success_message', 'Berhasil Menambahkan Category Baru');
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
        $categories = CategoryModel::find($id);
        if (!$categories) return redirect()->route('categories.index')->with('error_message', 'Category dengan id' . $id . 'tidak ditemukan');
        return view('categories.edit', ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $brand = CategoryModel::find($id);
        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('categories.index')->with('success_message', 'Berhasil mengubah Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryModel::find($id);
        if ($category) $category->delete();
        return redirect()->route('categories.index')->with('success_message', 'Berhasil menghapus Category');
    }
}
