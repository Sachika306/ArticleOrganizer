<?php
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\Role;

class AssignComposer
{
  public function compose(View $view)
  {
    // jQuery-UI autocomplete で使うためアウトライン・記事担当者の名前を配列にする
    $roles = Role::get();
            
    //アウトライン権限のユーザーを探す
    $outlineUsers = $roles->find(4)->user;
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
    $articleUsers = $roles->find(7)->user;
    $articleUserNames = array();
    if (count($articleUsers) > 0) {
        foreach ($articleUsers as $user) {
            $articleUserNames[] = array(
                'label' => $user->name,
                'value' => $user->id
            );
        }
    }
    
    $view->with('outlineUserNames', $outlineUserNames)->with('articleUserNames', $articleUserNames);
  }
}
