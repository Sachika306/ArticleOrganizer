<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{View, Auth};
use App\Models\{User, Article, Role, Thumbnail, RoleUser, OutlineAssignment, ArticleAssignment};
use App\Http\Requests\{ArticleCreateRequest, ArticleUpdateRequest};

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        return view ('article.index');
    }

    /**
     * Show the form for creating a new assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function assign()
    {
        // jQuery-UI autocomplete で使うためアウトライン・記事担当者の名前を配列にする
        $roles = Role::get();
        
        //アウトライン権限のユーザーを探す
        $outlineUsers = $roles->find(2)->user;
        $outlineUserNames = array();
        if (count($outlineUsers) > 0) {
            foreach ($outlineUsers as $user) {
                $outlineUserNames[] = array(
                    'label' => $user->name,
                    'value' => $user->id
                );
            }
        }
      
        //記事権限のユーザーを探す
        $articleUsers = $roles->find(3)->user;
        $articleUserNames = array();
        if (count($articleUsers) > 0) {
            foreach ($articleUsers as $user) {
                $articleUserNames[] = array(
                    'label' => $user->name,
                    'value' => $user->id
                );
            }
        }

       return view('article.assign', compact('outlineUserNames', 'articleUserNames'));
    }

    /**
     * Show the form for creating a new assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        $article = Article::create($request->all()); // Articleにデータを作る
        $article->outlineassignment()->create($request->all()); // OutlineAssignmentにデータを作る
        $article->articleassignment()->create($request->all()); // ArticleAssignmentにデータを作る
        $article->thumbnail()->create($request->all()); // Thumbnailにデータを作る
        return redirect('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contentEdit($id)
    {
        $article = Article::find($id);
        return view('article.contentEdit', compact('article'));
    }

    public function outlineEdit($id)
    {
        $article = Article::find($id);
        return view('article.outlineEdit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contentUpdate(ArticleUpdateRequest $request, $id)
    {
        $article = Article::find($id);
        $thumbnail = Thumbnail::where('article_id', '=', $id);
        
        if ($request->file('file_name') !== null) {
            $path = $request->file('file_name')->store('public/thumbnails'); //画像をpublic/thumbnailsに保存
            $thumbnail->update([
                'file_name' => basename($path)
            ]);
        };

        $article->update([
            'content' => $request->content,
            'title' => $request->title
        ]);

        return redirect()->back()->with('message', '内容が保存されました！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::find($id)->delete();
        return back();
    }


}
