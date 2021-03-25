@extends('layouts.main')

@section('content')

<div class="card w-75 mx-auto">

  <div class="card-header d-flex justify-content-between">
    <div>{{ __('記事詳細') }}</div>
    <a href="{{ url('/article/create') }}">
      <button type="button" class="btn btn-primary">記事作成</button>
    </a>
  </div>

  
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
  <tr>
    <th scope="row">{{ $article->id }}</th>
      <td>{{ $article->title }}</td>
      <td></td>
      <td>{{ $article->getData()->find($article->id)->outlineassignment->user_id }}</td>
      <td>{{ $article->getData()->find($article->id)->outlineassignment->outline_url }}</td>
      <td>{{ $article->getData()->find($article->id)->outlineassignment->outline_deadline }}</td>
      <td>{{ $article->getData()->find($article->id)->articleassignment->user_id }}</td>
      <td>{{ $article->getData()->find($article->id)->articleassignment->article_url }}</td>
      <td>{{ $article->getData()->find($article->id)->articleassignment->article_deadline }}</td>
      <td><a href="/article/show/{{ $article->id }}">詳細</a></td>
      <td>
        <form action="/article/destroy/{{ $article->id }}" id="delete" method="post">
        @csrf
        <button type="submit" id="delete">削除</button>
        </form>
      </td>
    </tr>
      </tbody>

    </table>

    <a href="{{ url('/article') }}">
      <button type="button" class="btn btn-secondary">一覧に戻る</button>
    </a>
  </div>
</div>
@endsection
