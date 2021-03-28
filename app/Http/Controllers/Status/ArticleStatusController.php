<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleStatusController extends Controller
{
    // 
    public function submit($id)
    {
        $article = Article::find($id)->update([
            'status_id' => 7
        ]);
        return redirect()->back()->with('message', '申請が完了しました');
    }

    public function decline($id)
    {

    }

    public function approve($id)
    {

    }
}
