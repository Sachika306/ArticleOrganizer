<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PostController extends Controller
{
    //
    public function show($id)
    {
        //
        $article = Article::find($id);
        return view('article.show', compact('article'));
    }
}
