<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{View, Auth};
use App\Models\{User, Article, Role, Status, Thumbnail, RoleUser, OutlineAssignment, ArticleAssignment, Outline};
use App\Http\Requests\{ArticleCreateRequest, ArticleUpdateRequest, OutlineUpdateRequest};

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $articles = Article::paginate(15);
        return view ('article.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function assign()
    {
       return view('article.assign');
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

    public function reassign(Request $request, $id)
    {
        $outlineAssignment = OutlineAssignment::where('article_id', '=', $id)
            ->update([ 'outline_user_id' => $request->outline_user_id]);
        $articleAssignment = ArticleAssignment::where('article_id', '=', $id)
            ->update([ 'article_user_id' => $request->article_user_id]);

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
        $outline = OutlineAssignment::where('article_id', '=', $id)->delete();
        $article = OutlineAssignment::where('article_id', '=', $id)->delete();
        return back();
    }

    /**
     * 
     * Preview article
     * 
     */
    public function preview($id){
        $article = Article::find($id);
        return view('post.show', compact('article'));
    }

    /**
     * 
     * Preview Outline
     * 
     */
    public function outline($id){
        $article = Article::find($id);
        $outline = Outline::find($id);
        return view('article.outline', compact('article', 'outline')); 
    }
}
