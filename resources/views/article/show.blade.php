@extends('layouts.main')

@section('content')

<div class="card w-75 mx-auto">

  <div class="card-body">
    
    <div class="card-body d-flex justify-content-between">
      <div>
        <a href="/article/edit/{{ $article->id }}">
          <button type="button" class="btn btn-primary">記事編集</button>
        </a>
        <a href="{{ url('/article/update') }}">
          <button type="button" class="btn btn-success">記事申請</button>
        </a>
        <a href="{{ url('/article/preview') }}">
          <button type="button" class="btn btn-secondary">プレビュー</button>
        </a>
      </div>
      <div>{{ $article->status->name }}</div>
    </div>
    <div>
      <h2 class="display-6">（ID:{{ $article->id }}） {{ $article->title }}</h2>
      <hr>
    </div>
    
      <div>
        <h3 class="display-6">アウトライン</h3>
      </div>

      <div>
        <h3 class="display-6">画像</h3>
      </div>

      <div>
        <h3 class="display-6">記事本文</h3>
        <p>daufheuwhguirehguiehuihowiljpoqwopdkopwkdopwkorueiowhruejnjkfdnkfdn</p>
      </div>
    

        <div class="card-body">
          <a href="{{ url('/article') }}">
            <button type="button" class="btn btn-secondary">一覧に戻る</button>
          </a>
        </div>
    
      </div>
    </div>
  </div>
</div>
@endsection
