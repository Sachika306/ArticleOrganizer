<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;

class ArticleFilterController extends Controller
{

    public function sort(Request $request)
    {
        //status_idを定義する
        $statusId = $request->status_id; 

        //記事を取得
        $query = Article::get();

        if ($statusId > 0) {
            $articles = Article::where('status_id', $statusId)->paginate(15);
            $articles->withPath('?status_id='.$statusId);
            return view('article.index')->with('articles', $articles);
        } else {
            return redirect('/article');
        }
        
        
    }
}
