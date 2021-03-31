@extends('layouts.mainheader')

@section('content')

<div class="card w-75 mx-auto">
  <div class="card-body">
    
      <div class="card-body">
        <div>
          <div class="d-flex">
            @can('admin-user')
              @if($article->status_id == 4)
              <form method="post" action="/outline/approve/{{ $article->id }}" class="approve">
                @csrf
                <button type="submit" class="btn btn-success">承認する</button>
              </form>
              <form method="post" action="/outline/decline/{{ $article->id }}" class="decline">
                @csrf
                <button type="submit" class="btn btn-danger">修正依頼</button>
              </form>
              @elseif($article->status_id == 7)
              <form method="post" action="/article/approve/{{ $article->id }}" class="approve">
                @csrf
                <button type="submit" class="btn btn-success">承認する</button>
              </form>
              <form method="post" action="/article/decline/{{ $article->id }}" class="decline">
                @csrf
                <button type="submit" class="btn btn-danger">修正依頼</button>
              </form>
              @elseif($article->status_id == 8)
                @if($article->publish_flg == 0)
                <form method="post" action="/article/publish/{{ $article->id }}" id="publish">
                  @csrf
                  <button type="submit"  class="btn btn-success">公開する</button>
                </form>
                @elseif($article->publish_flg == 1)
                <form method="post" action="/article/withhold/{{ $article->id }}" id="withhold">
                  @csrf
                  <button type="submit" class="btn btn-secondary">非公開にする</button>
                </form>
                @endif
              @endif

            @elsecan('article-user')
              @if($article->status_id == 5 || $article->status_id == 6)
                <a href="/article/edit/{{ $article->id }}">
                  <button type="button" class="btn btn-primary">記事編集</button>
                </a>
              @endif
            @elsecan('outline-user')
              @if($article->status_id < 1)
                <a href="/outline/edit/{{ $article->id }}">
                  <button type="button" class="btn btn-primary">アウトライン作成</button>
                </a>
              @endif
            @endcan
            <a href="{{ url('/article/preview') }}">
              <button type="button" class="btn btn-secondary">プレビュー</button>
            </a>
          </div>
        </div>
      </div>
    
        <div class="card-body">
          <div class="mb-5">
            <h2 class="display-6 d-inline-block">ID:{{ $article->id }} {{ $article->title }}</h2>
              <span class="text-light ml-3">
                  @include('layouts.article.status')
                      {{ $article->status->name }}
                  </div>
              </span>
              <hr>
          </div>

          <div class="mb-5">
            <h3 class="display-6">画像</h3>
            @isset($article->thumbnail->file_name)
            <div class="form-group">
              <img style="max-height: 300px; width: 100%; object-fit: cover; object-position: left top; max-width: 100%; border-radius: 0.25rem; border: 1px solid #ced4da;" src="{{ asset('/storage/thumbnails/'.$article->thumbnail->file_name) }}"> 
            </div>
            @else 
            <div class="form-group" style="height: 300px; width: 100%; object-fit: cover; object-position: left top; max-width: 100%; border-radius: 0.25rem; border: 1px solid #ced4da; background-color: gray;">
              <div>
               <p class="center">画像が未設定です。</p>
              </div>
            </div>
            @endisset
          </div>

          <div class="mb-5">
            <h3 class="display-6">アウトライン</h3>
            <div class="form-control" style="height:auto;">
            @isset($article->outline->persona)
             {{ $article->outline->persona }}<a class="pull-right">アウトラインプレビュー</a>
            @else
              <p>アウトラインはまだ設定されていません。</p>
            @endisset
            </div>
          </div>

          <div class="mb-5">
            <h3 class="display-6">記事本文</h3>
            <div class="form-control" style="height:auto;">
            @isset($article->content)
              {{ Str::limit(($article->content), 300) }}
            @else
              <p>記事本文がまだありません。</p>
            @endisset
            </div>
          </div>
        
        </div>

        <div class="card-body d-flex">
          <a href="{{ url('/article') }}">
            <button type="button" class="btn btn-secondary">一覧に戻る</button>
          </a>
          @can('admin-user')
          @elsecan('article-user')
            @if($article->status_id < 7)
            <form method="post" action="/article/submit/{{ $article->id }}" class="submit">
              <button type="button" class="btn btn-success">記事申請</button>
            </form>
            @endif
          @elsecan('outline-user')
            @if($article->status_id < 4)
            <form method="post" action="/article/submit/{{ $article->id }}" class="submit">
              @csrf
              <button type="submit" class="btn btn-success">アウトライン申請</button>
            </form>
            @endif
          @endcan
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
