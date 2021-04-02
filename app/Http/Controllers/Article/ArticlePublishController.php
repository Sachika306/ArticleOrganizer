<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;

class ArticlePublishController extends Controller
{
    public function publish($id)
    {
        $article = Article::find($id)->update([
            'publish_flg' => 1
        ]);
        return redirect()->back()->with('message', '公開完了しました。'); 
    }

    public function withhold($id)
    {
        $article = Article::find($id)->update([
            'publish_flg' => 0
        ]);
        return redirect()->back()->with('message', '非公開にしました。'); 
    }
}
