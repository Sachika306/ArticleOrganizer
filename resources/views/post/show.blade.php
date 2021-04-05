@extends('layouts.postheader')

@section('content')

<div class="card w-75 mx-auto my-5">
  <div class="card-body">
    
    @if($article->publish_flg !== 1)
    <div class="alert alert-success" role="alert">
      <p>これはプレビュー画面です。</p>
    </div>
    @endif

        <div class="card-body title-wrapper">
          <div>
            <h2 class="display-6">{{ $article->title }}</h2>
            <hr>
          </div>
        
          <div>
            {!! $article->content !!}
          </div>
        
        </div>

        <div class="card-body">
          <a href="{{ url('/') }}">
            <button type="button" class="btn btn-secondary">一覧に戻る</button>
          </a>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
