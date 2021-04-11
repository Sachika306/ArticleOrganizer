@extends('layouts.mainheader')

@section('content')

<div class="card w-75 mx-auto">

  <div class="card-body">
    <form method="post" action="/article/update/{{ $article->id }}" enctype="multipart/form-data" class="w-75 mx-auto">
    @csrf
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $article->title }}">
                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group">
            <label for="file_name">アイキャッチ画像</label>
            <input type="file" name="file_name" class="form-control {{ $errors->has('file_name') ? ' is-invalid' : '' }}" value="">
                @if ($errors->has('file_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('file_name') }}</strong>
                    </span>
                @endif
        </div>

        @isset($article->thumbnail->file_name)
        <div class="form-group">
            <img style="max-height: 300px; width: 100%; object-fit: cover; object-position: left top; max-width: 100%; border-radius: 0.25rem; border: 1px solid #ced4da;" src="{{ $s3path.$article->thumbnail->file_name }}">
        </div>
        @endisset

        <div class="form-group">
            <label for="exampleFormControlTextarea1">記事本文</label>
            <textarea class="description" name="content">{{ $article->content }}</textarea>
            <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
            <script>
                tinymce.init({
                    selector:'textarea.description',
                    height: 300
                });
            </script>
        </div>

        
          <button type="submit" name="submit" class="btn btn-primary">記事を保存する</button>
          <a href="/article/show/{{ $article->id }}">
            <button type="button" class="btn btn-secondary">記事詳細に戻る</button>
          </a>
        

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
