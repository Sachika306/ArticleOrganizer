<?php

namespace App\Http\Controllers\Outline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class OutlineStatusController extends Controller
{
    // 
    public function submit($id)
    {
        $article = Article::find($id)->update([
            'status_id' => 4
        ]);
        return redirect()->back()->with('message', '申請が完了しました');
    }

    public function decline($id)
    {
        $article = Article::find($id)->update([
            'status_id' => 3
        ]);
        return redirect()->back()->with('message', '修正依頼が完了しました。');
    }

    public function approve($id)
    {
        $article = Article::find($id)->update([
            'status_id' => 5
        ]);
        return redirect()->back()->with('message', '承認が完了しました。');
    }
}
