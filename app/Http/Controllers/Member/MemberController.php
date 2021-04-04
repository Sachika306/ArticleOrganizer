<?php

namespace App\Http\Controllers\Member;

use App\Models\{User, RoleUser, Article, OutlineAssignment, ArticleAssignment};
use Illuminate\Http\Request;
use App\Http\Requests\{RegisterRequest, MemberSettingRequest};
use Illuminate\Support\Facades\Auth;
use App\Requests\MemberDestroyRequest;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    { 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        $articles = Article::all();
        $outlineAssignments = OutlineAssignment::all()->where('outline_user_id', '=', $id);
        $articleAssignments = ArticleAssignment::all()->where('article_user_id', '=', $id);
        return view('member.show', compact('user', 'outlineAssignments', 'articleAssignments', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('member.edit');
    }

    /**
     * Edit the information of logged in user
     *
     * @param  
     * @return 
     */
    public function setting()
    {
        //
        return view('member.setting');
    }

    public function settingupdate(MemberSettingRequest $request)
    {
        //
        $update = $request->all();
        $update['name'] = $update['last_name'].' '.$update['first_name'];
        User::find(Auth::user()->id)->fill($update)->save();
        return redirect('/member/setting')->with('message', '設定変更が完了しました。');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return view('');
    }

    public function updateGuest(Request $request)
    {
        RoleUser::where('user_id', '=', Auth::user()->id)->first()->update(['role_id' => $request->role_id]);
        return back()->with('message', '権限を変更しました。');
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
        $user = User::find($id);
        $roleuser = RoleUser::where('user_id', '=', $id);
        $outlineAssignment = OutlineAssignment::all();
        $articleAssignment = ArticleAssignment::all();
        $ongoingOutlines =  $outlineAssignment->where('outline_user_id', $user->id)->pluck('article_id');
        $ongoingArticles =  $articleAssignment->where('article_user_id', $user->id)->pluck('article_id');

        if ($user->roles->first->id->pivot->role_id == 4 || $user->roles->first->id->pivot->role_id == 7) {
            if ( $ongoingArticles->count() > 0) {
                foreach ($ongoingArticles as $article) {
                    $status = Article::find($article)->status_id;
                    if ($status !== 8) {
                        return back()->with('message_error', '担当中のタスクがあるため、メンバーは削除できません。メンバー詳細画面で進行中のタスクを確認して、他の担当者に割り当ててから削除してください。');
                    }
                }
            } else if ($ongoingOutlines->count() > 0) {
                return back()->with('message_error', '担当中のタスクがあるため、メンバーは削除できません。メンバー詳細画面で進行中のタスクを確認して、他の担当者に割り当ててから削除してください。');
                
            }
        }
        
        $user->delete();
        $roleuser->delete();
        return redirect('/member')->with('message', 'メンバーは削除されました。'); 

    }
}