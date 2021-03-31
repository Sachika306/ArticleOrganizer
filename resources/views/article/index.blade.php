@extends('layouts.mainheader')

@section('content')


<div class="card w-100 mx-auto">

  <div class="card-header">
    <div>
    {{ __('記事一覧') }}
    </div>
  </div>

  <div class="d-flex card-body justify-content-between w-100 mx-auto">
    <form method="GET" action="{{ url('article/sort') }}" class="w-50 d-flex">
      <select class="col-8 mr-3 custom-select" name="status_id">
              <option value="0">すべての記事</option>
            @foreach($statuses as $status)
              <option name="{{ $status->id }}" value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
      </select>
      <div class="">
        <a href="/article/assign">
            <button type="submit" class="btn btn-secondary">表示</button>
        </a>
      </div>
    </form>
    
    @can('admin-user')
    <div>
        <a href="/article/assign">
            <button type="button" class="btn btn-primary">新規登録</button>
        </a>
    </div>
    @endcan
  </div>

  <div class="table-responsive-sm card-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ステータス</th>
          <th scope="col">タイトル</th>
          <th scope="col">アウトライン納期</th>
          <th scope="col">アウトライン担当者</th>
          <th scope="col">記事納期</th>
          <th scope="col">記事担当</th>
          <th scope="col">編集</th>
          @can('admin-user')
          <th scope="col">削除</th>
          @endcan
        </tr>
      </thead>

      <tbody>
        @foreach($articles as $article)
          <tr>
            <th scope="row">{{ $article->id }}</th>
              <td>
                <span class="text-light">
                    @include('layouts.article.status')
                    {{ $article->status->name }}
                    </div>
                </span>
              </td>
              <td>{{ $article->title }}</td>
              <td>{{ $article->outlineassignment->outline_deadline }}</td>
              <td>{{ $users->find($article->outlineassignment->outline_user_id)->name }}</td> 
              <td>{{ $article->articleassignment->article_deadline }}</td>
              <td>{{ $users->find($article->articleassignment->article_user_id)->name }}</td>
              <td><a href="/article/show/{{ $article->id }}">詳細</a></td>
              @can('admin-user')
                <td>
                  <form action="/article/destroy/{{ $article->id }}" class="delete" method="post">
                  @csrf
                  <button type="submit">削除</button>
                  </form>
                </td>
              @endcan

        
          </tr>

        @endforeach
        
      </tbody>
    </table>
    {{ $articles->links() }}
  </div>
</div>

@endsection
