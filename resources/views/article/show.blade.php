@extends('layouts.mainheader')

@section('content')

<div class="card w-75 mx-auto">
  <div class="card-body">
    
      <div class="card-body">
        <div class="">
          <div>
            <a href="/article/content/edit/{{ $article->id }}">
              <button type="button" class="btn btn-primary">記事編集</button>
            </a>
            <a href="/article/outline/edit/{{ $article->id }}">
              <button type="button" class="btn btn-secondary">アウトライン作成</button>
            </a>
            <a href="{{ url('/article/preview') }}">
              <button type="button" class="btn btn-secondary">プレビュー</button>
            </a>
          </div>
        </div>
      </div>
    
        <div class="card-body">
          <div>
            <h2 class="display-6 d-inline-block">（ID:{{ $article->id }}） {{ $article->title }}</h2>
              <span class="text-light ml-3">
                  @include('layouts.article.status')
                      {{ $article->status->name }}
                  </div>
              </span>
          
            <hr>
          </div>
        
          @isset($article->thumbnail->file_name)
          <div class="form-group mx-auto">
              <img style="max-height: 300px; max-width: 100%; border-radius: 0.25rem; border: 1px solid #ced4da;" src="{{ asset('/storage/thumbnails/'.$article->thumbnail->file_name) }}"> 
          </div>
          @endisset



          <div>
            <h3 class="display-6">記事本文</h3>
            <hr>
            <div class="form-control" style="height:auto;">
            {{ Str::limit(($article->content), 300) }}
            
            </div>
          </div>
        
        </div>

        <div class="card-body">
          <a href="{{ url('/article') }}">
            <button type="button" class="btn btn-secondary">一覧に戻る</button>
          </a>
          <a href="{{ url('/article/content/update') }}">
            <button type="button" class="btn btn-success">記事申請</button>
          </a>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
