@extends('layouts.main')

@section('content')

<div class="card w-75 mx-auto">

  <div class="card-body">
    <form method="post" action="article/store" class="w-75 mx-auto">
    @csrf

        
            
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $article->title }}">
                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">アイキャッチ画像</label>
            <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">記事本文</label>
            <textarea class="description" name="content"></textarea>
            <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
            <script>
                tinymce.init({
                    selector:'textarea.description',
                    height: 300
                });
            </script>
        </div>
    </form>

    


        <div class="card-body">
          <a href="/article/show/{{ $article->id }}">
            <button type="button" class="btn btn-primary">記事を保存する</button>
          </a>
          <a href="/article/show/{{ $article->id }}">
            <button type="button" class="btn btn-secondary">記事詳細に戻る</button>
          </a>
        </div>
    
      </div>
    </div>
  </div>
</div>
@endsection
