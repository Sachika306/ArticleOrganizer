<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Models\{Article, User, OutlineAssignment, ArticleAssignment};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SearchRequest;

class ArticleFilterController extends Controller
{

    public function sort(Request $request)
    {
        //status_idを定義する
        $statusId = $request->status_id; 

        if ($statusId > 0) {
            $articles = Article::where('status_id', $statusId)->paginate(15);
            $articles->withPath('?status_id='.$statusId);
            return view('article.index')->with('articles', $articles);
        } else {
            return redirect('/article');
        }
    
    }

    public function search(Request $request)
    {
        //キーワードを取得
        $keyword = $request->input('keyword');
        $query = Article::with('outlineassignment', 'articleassignment');

        if(!empty($keyword))
        {
            $data = $query->where('title','like','%'.$keyword.'%')
                ->orWhere('content','like','%'.$keyword.'%');
                
            $articles = $data->paginate(12);
            return view('article.index')->with('articles', $articles);
        } else {
            $data = $query->where('title','like','%'.$keyword.'%')
            ->orWhere('content','like','%'.$keyword.'%');
            
            $articles = $data->paginate(12);
            return view('article.index')->with('articles', $articles);
        }

      }
    public function find(Request $request){
        $articles = Articles::paginate(12);
        return view('article.index')->with('articles', $articles);
    }
}
