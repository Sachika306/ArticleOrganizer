@extends('layouts.mainheader')

@section('content')


<div class="card w-100 mx-auto">

  <div class="card-header">
    <div>
    {{ __('記事一覧') }}
    </div>
  </div>

  <div class="mt-3 container d-flex">
    <div class="col-6 d-flex">
      <select class="custom-select{{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id">
          <option value="">記事のステータス</option>
            @foreach($statuses as $status)
              <option value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
      </select>

      <div class="">
        <a href="/article/assign">
            <button type="button" class="btn btn-primary pull-right">表示</button>
        </a>
      </div>
    </div>

    @can('admin-user')
    <div>
        <a href="/article/assign">
            <button type="button" class="btn btn-primary pull-right">新規登録</button>
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
                  <form action="/article/destroy/{{ $article->id }}" id="delete" method="post">
                  @csrf
                  <button type="submit" id="delete">削除</button>
                  </form>
                </td>
              @endcan
          </tr>

          {{ $articles->links() }}
          
        @endforeach
      </tbody>
    </table>

  </div>
</div>

@endsection
