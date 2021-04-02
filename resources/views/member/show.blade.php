@extends('layouts.mainheader')

@section('content')


<div class="card w-75 mx-auto">

  <div class="card-header">
    <div>{{$user->name}}さんの詳細画面</div>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">姓</th>
          <th scope="col">名</th>
          <th scope="col">メールアドレス</th>
          <th scope="col">権限</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="col">{{ $user->id }}</th>
          <td scope="col">{{ $user->last_name }}</th>
          <td scope="col">{{ $user->first_name }}</th>
          <td scope="col">{{ $user->email }}</th>
          <td scope="col">{{ $user->roles->first()->name }}</th>
        </tr>
      </tbody>
    </table>

    <div class="card-body">
    
    @if($user->roles->first()->id == 7 || $user->roles->first()->id == 4) 
      <h2 class="display-6">担当中の案件</h2>
        <ul>
        @foreach($outlineAssignments as $outlineAssignment)
          <li><a href="/article/show/{{ $outlineAssignment->article_id }}" target="_blank">{{ $articles->find($outlineAssignment->article_id)->title }}</a>（アウトライン担当）</li>
        @endforeach
        </ul>
        <ul>
        @foreach($articleAssignments as $articleAssignment)
          <li><a href="/article/show/{{ $articleAssignment->article_id }}" target="_blank">{{ $articles->find($articleAssignment->article_id)->title }}</a>（記事担当）</li>
        @endforeach
        </ul>
    @endif
    <div>
    </div>
    </div>

    <a href="/member">
      <button type="button" class="btn btn-secondary flex-left">一覧に戻る</button>
    </a>
  </div>
</div>







@endsection