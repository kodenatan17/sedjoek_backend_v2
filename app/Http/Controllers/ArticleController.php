<?php

namespace App\Http\Controllers;


use App\Http\Requests\ArticleRequest;
use App\Models\ArticleModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = ArticleModel::all();

        return view('articles.index', ['article' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $array = $request->only([
            'title', 'content', 'created_by', 'type', 'created_at'
        ]);
        $article = ArticleModel::create($array);
        return redirect()->route('article.index')->with('success_message', 'Berhasil Menambahkan Article Baru');
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
        $article = ArticleModel::find($id);
        if (!$article) return redirect()->route('articles.index')->with('error_message', 'Article dengan id' . $id . 'tidak ditemukan');
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = ArticleModel::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->created_by = $request->created_by;
        $article->type = $request->type;
        $article->save();
        return redirect()->route('articles.index')->with('success_message', 'Berhasil mengubah artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleRequest $request, $id)
    {
        $article = ArticleModel::find($id);
        if ($article) $article->delete();
        return redirect()->route('articles.index')->with('success_message', 'Berhasil menghapus artikel');
    }
}