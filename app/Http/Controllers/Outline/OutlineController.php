<?php

namespace App\Http\Controllers\Outline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{View, Auth};
use App\Models\{User, Article, Role, Status, Thumbnail, RoleUser, OutlineAssignment, ArticleAssignment, Outline};
use App\Http\Requests\{ArticleCreateRequest, ArticleUpdateRequest, OutlineUpdateRequest};
use App\Http\Controllers\Controller;

class OutlineController extends Controller
{

    public function outlineEdit($id)
    {
        $article = Article::find($id);
        return view('article.outline_edit', compact('article'));
    }
    
    public function outlineUpdate(OutlineUpdateRequest $request, $id)
    {
        $article = Article::find($id);
        $outline = Outline::where('article_id', '=', $id);

        $article->update([
            'title' => $request->title
        ]);

        $outline->update($request->except(['_token', 'title', 'submit']));
        return redirect()->back()->with('message', '内容が保存されました！');
    }

    public function preview($id){
        $article = Article::find($id);
        $outline = Outline::find($id);
        return view('article.outline', compact('article', 'outline')); 
    }
}
