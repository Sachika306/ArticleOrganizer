<?php

namespace App\Http\Controllers;
use App\Models\{User, RoleUser, OutlineAssignment, ArticleAssignment};
use Illuminate\Http\Request;
use App\Http\Requests\{RegisterRequest, MemberSettingRequest};
use Illuminate\Support\Facades\Auth;
use App\Requests\MemberDestroyRequest;

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
        return view('member.show', $user);
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
        $form = $request->all();
        $form['name'] = $form['last_name'].' '.$form['first_name'];
        User::find(Auth::user()->id)->fill($form)->save();
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

        if ($user->roles->first->id->pivot->role_id == 4 || $user->roles->first->id->pivot->role_id == 7) {
            if ($articleAssignment->where('article_user_id', $user->id)->count() > 0 ) {
                return redirect('/article')->with('message_error', '担当中のタスクがあるため、メンバーは削除できません。メンバー詳細画面で進行中のタスクを確認して、他の担当者に割り当ててから削除してください。');
            } else if ($outlineAssignment->where('article_user_id', $user->id)->count() > 0 ) {
                return redirect('/article')->with('message_error', '担当中のタスクがあるため、メンバーは削除できません。メンバー詳細画面で進行中のタスクを確認して、他の担当者に割り当ててから削除してください。');
            } else {
                $user->delete();
                $roleuser->delete();
                return back()->with('message', 'メンバーは削除されました。');     
            }
        } 

    }
}
