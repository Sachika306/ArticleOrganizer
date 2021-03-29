<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleFilterController extends Controller
{

    public function sort(Request $request)
    {
        //入力される値nameの中身を定義する
        $statusId = $request->status_id; //カテゴリの値

        $query = Article::get();
        //カテゴリが選択された場合、m_categoriesテーブルからcategory_idが一致する商品を$queryに代入
        if ($statusId > 0) {
            $articles = Article::where('status_id', $statusId)->paginate(1);
            return view('article.index')->with('articles', $articles);
        } else {
            return redirect('/article');
        }
        
        
    }
}
