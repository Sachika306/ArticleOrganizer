@extends('layouts.mainheader')

@section('content')

<div class="card w-75 mx-auto">

  <div class="card-body">
    <form method="post" action="/outline/update/{{ $article->id }}" enctype="multipart/form-data" class="w-75 mx-auto">
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

        1to1 (article->outline)
        ペルソナ　persona
        共起語（これらを理解し、本文中で言及する）keyword

        リード文　文字数

        見出し2　文字数
        概要

        見出し2　文字数
        概要

        見出し2　文字数
        概要

        見出し2　文字数

        total
        参考文献

        まとめ

        <div class="form-group">
            <label for="title">リード文</label>
            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $article->title }}">
                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
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
