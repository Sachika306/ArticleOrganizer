@extends('layouts.mainheader')

@section('content')

<div class="card w-75 mx-auto">

  <div class="card-body">
    <form method="post" action="/outline/update/{{ $article->id }}" enctype="multipart/form-data" class="w-75 mx-auto">
    @csrf

        <h2>基本情報</h2>
        <div class="card-body">
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
              <label for="persona">ペルソナ</label>
              <textarea rows="5" class="form-control {{ $errors->has('persona') ? ' is-invalid' : '' }}" id="persona" name="persona" value=""></textarea>
                  @if ($errors->has('persona'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('persona') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group">
              <label for="persona">キーワード</label>
              <p><small><a href="https://funmaker.jp/seo/funkeyrating/" target="_blank">https://funmaker.jp/seo/funkeyrating/</a>でキーワードを取得し、コンマで区切ってください。</small></p>
              <textarea rows="5" class="form-control {{ $errors->has('persona') ? ' is-invalid' : '' }}" id="persona" name="persona" value=""></textarea>
                  @if ($errors->has('persona'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('persona') }}</strong>
                      </span>
                  @endif
          </div>
        </div>

        <h2>本文</h2>
          <div class="card-body">

            <div class="form-group">
                <label for="title">リード文</label>
                <div class="d-flex d-inline-block">
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }} col-10" id="title" name="title" value="{{ $article->title }}">
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                      <input type="number" class="form-control col-1 ml-2">
                      <p class="m-1">文字</p>
                </div>
            </div>

            <div class="form-group">
                <textarea rows="5" class="form-control {{ $errors->has('persona') ? ' is-invalid' : '' }}" id="persona" name="persona" value=""></textarea>
                    @if ($errors->has('persona'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('persona') }}</strong>
                        </span>
                    @endif
            </div>



            <div class="form-group">
                <label for="title">見出し2-1　タイトルと概要</label>
                <div class="d-flex d-inline-block">
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }} col-10" id="title" name="title" value="{{ $article->title }}">
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                      <input type="number" class="form-control col-1 ml-2">
                      <p class="m-1">文字</p>
                </div>
            </div>

            <div class="form-group">
                <textarea rows="5" class="form-control {{ $errors->has('persona') ? ' is-invalid' : '' }}" id="persona" name="persona" value=""></textarea>
                    @if ($errors->has('persona'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('persona') }}</strong>
                        </span>
                    @endif
            </div>



            <div class="form-group">
                <label for="title">まとめ</label>
                <div class="d-flex d-inline-block">
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }} col-10" id="title" name="title" value="{{ $article->title }}">
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                      <input type="number" class="form-control col-1 ml-2">
                      <p class="m-1">文字</p>
                </div>
            </div>

            <div class="form-group">
                <textarea rows="5" class="form-control {{ $errors->has('persona') ? ' is-invalid' : '' }}" id="persona" name="persona" value=""></textarea>
                    @if ($errors->has('persona'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('persona') }}</strong>
                        </span>
                    @endif
            </div>

            <input type="number" class="form-control col-1 ml-2">
                      <p class="m-1">文字（合計）</p>

          </div>


          <h2>参考文献</h2>
          <div class="form-group">
                <textarea rows="5" class="form-control {{ $errors->has('persona') ? ' is-invalid' : '' }}" id="persona" name="persona" value=""></textarea>
                    @if ($errors->has('persona'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('persona') }}</strong>
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
