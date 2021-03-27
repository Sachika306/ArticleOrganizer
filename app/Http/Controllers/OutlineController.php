<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class OutlineController extends Controller
{
    //
    public function edit($id)
    {
        $article = Article::find($id);
        return view('outline.edit', compact('article'));
    }
    public function store($id)
    {
        return redirect()->back()->with('message', '保存が完了しました。');
    }
}
