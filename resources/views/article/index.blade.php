@extends('layouts.main')

@section('content')


<div class="card w-75 mx-auto">

  <div class="card-header d-flex justify-content-between">
    <div>{{ __('記事一覧') }}</div>
    <a href="{{ url('/article/assign') }}">
      <button type="button" class="btn btn-primary">新規登録</button>
    </a>
  </div>

  <div class="table-responsive-sm">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">タイトル</th>
          <th scope="col">ステータス</th>
          <th scope="col">アウトライン納期</th>
          <th scope="col">アウトライン担当者</th>
          <th scope="col">アウトラインURL</th>
          <th scope="col">記事納期</th>
          <th scope="col">記事担当</th>
          <th scope="col">記事URL</th>
          <th scope="col">編集</th>
          <th scope="col">削除</th>
        </tr>
      </thead>

      <tbody>
        @foreach($articles as $article)
          <tr>
            <th scope="row">{{ $article->id }}</th>
              <td>{{ $article->status->name }}</td>
              <td>{{ $article->title }}</td>
              <td>{{ $article->outlineassignment->outline_deadline }}</td>
              <td>{{ $users->find($article->outlineassignment->outline_user_id)->name }}</td> 
              <td><a href="{{ $article->outlineassignment->outline_url }}">詳細</a></td>
              <td>{{ $article->articleassignment->article_deadline }}</td>
              <td>{{ $users->find($article->articleassignment->article_user_id)->name }}</td>
              <td><a href="{{ $article->articleassignment->article_url }}">編集</a></td>
              <td><a href="/article/show/{{ $article->id }}">詳細</a></td>
              <td>
                <form action="/article/destroy/{{ $article->id }}" id="delete" method="post">
                @csrf
                <button type="submit" id="delete">削除</button>
                </form>
              </td>
          </tr>

          {{ $articles->links() }}
          
        @endforeach
      </tbody>

    </table>
  </div>
</div>

@endsection
