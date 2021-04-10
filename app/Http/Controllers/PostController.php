<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index()
    {
        //
        $articles = Article::where('publish_flg', 1)->paginate(15);
        return view('post.index', compact('articles'));
    }
    
    public function show($id)
    {
        //
        $article = Article::find($id);
        if ($article->publish_flg == 1) {
            return view('post.show', compact('article'));
        } else {
            return redirect('/');
        }
        
    }
}
