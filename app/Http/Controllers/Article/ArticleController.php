<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{View, Auth, DB};
use App\Models\{User, Article, Role, Status, Thumbnail, RoleUser, OutlineAssignment, ArticleAssignment, Outline};
use App\Http\Requests\{ArticleCreateRequest, ArticleUpdateRequest, OutlineUpdateRequest};
use App\Http\Controllers\Controller;
use Storage; //AWSのS3に保存する用

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
            $newArticle = Article::create($request->all());
                $request_params = $request->all();
                $request_params['article_id'] = $newArticle->id; // 記事のIDを取得、リクエストの配列に「article_id」として追加する。
            $newArticle = OutlineAssignment::create($request_params);
            $newArticle = ArticleAssignment::create($request_params);
            $newArticle = Thumbnail::create($request_params);
            $newArticle = Outline::create($request_params);
            return redirect('/article')->with('message', '新しい記事が登録されました。');
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
        $article = ArticleAssignment::where('article_id', '=', $id)->delete();
        return back();
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
        return view('article.content_edit', compact('article'));
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

        // 画像のファイル名をimage変数に格納
        $image = $request->file('file_name');

        if ($image != null) {
        // config>filesystem>disksの配列の中からs3を探して、putFileで取得した画像をバケットのフォルダにアップロード。
        $path = Storage::disk('s3')->putFile('thumbnails', $image, 'public');

        // thumbnailのテーブルに、ファイルの名前を保存。
        $thumbnail->update([ 
            'file_name' => basename($path)
        ]);
        }

        $article->update([
            'content' => $request->content,
            'title' => $request->title
        ]);

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

    public function preview($id){
        $article = Article::find($id);
        return view('post.show', compact('article'));
    }

}
