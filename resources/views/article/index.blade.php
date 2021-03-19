@extends('layouts.main')

@section('title', '記事管理画面')

@section('content')


<a href="{{ url('/article/create') }}">
<button type="button" class="btn btn-secondary">新規登録
</button>
</a>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">タイトル</th>
      <th scope="col">ステータス</th>
      <th scope="col">アウトライン担当者</th>
      <th scope="col">アウトラインURL</th>
      <th scope="col">アウトライン納期</th>
      <th scope="col">記事担当</th>
      <th scope="col">記事URL</th>
      <th scope="col">記事納期</th>
      <th scope="col">編集</th>
      <th scope="col">削除</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
    <th scope="row">{{ $article->id }}</th>
      <td>{{ $article->title }}</td>
      <td>{{ $article->status_id }}</td>
      <td>{{ $article->find($article->id)->outlineassignment->outline_user_id }}</td>
      <td>{{ $article->find($article->id)->outlineassignment->outline_url }}</td>
      <td>{{ $article->find($article->id)->outlineassignment->outline_deadline }}</td>
      <td>{{ $article->find($article->id)->articleassignment->article_user_id }}</td>
      <td>{{ $article->find($article->id)->articleassignment->article_url }}</td>
      <td>{{ $article->find($article->id)->articleassignment->article_deadline }}</td>
      <td><a href="/article/show/{{ $article->id }}">詳細</a></td>
      <td>
        <form action="/article/destroy/{{ $article->id }}" id="delete" method="post">
        @csrf
        <button type="submit" id="delete">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $articles->links() }}
@endsection
