<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\ArticleModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $title = $request->input('title');
        $show_article = $request->input('show_article');
        $content = $request->input('content');
        $type = $request->input('type');
        $created_by = $request->input('created_by');

        if ($id) {
            $article = ArticleModel::all()->find($id);
            if ($article) {
                return ResponseFormatter::success($article, 'Data Article Berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data Article tidak ada', 404);
            }
        }
        $article = ArticleModel::query();

        if ($title) {
            $article->where('title', 'like', '%' . $title . '%');
        }
        if ($content) {
            $article->where('content', 'like', '%' . $content . '%');
        }
        if ($type) {
            $article->where('type', 'like', '%' . $type . '%');
        }
        if ($created_by) {
            $article->where('created_by', 'like', '%' . $created_by . '%');
        }
        if($show_article){
            $article->all();
        }
        return ResponseFormatter::success(
            $article->paginate($limit),
            'Data Article berhasil diambil',
        );
    }
}
