<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PostController extends Controller
{
    //
    public function index()
    {
        //
        $articles = Article::paginate(15);
        return view('post.index', compact('articles'));
    }
    
    public function show($id)
    {
        //
        $article = Article::find($id);
        return view('post.show', compact('article'));
    }
}
