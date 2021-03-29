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
                <textarea rows="3" class="form-control {{ $errors->has('persona') ? ' is-invalid' : '' }}" id="persona" name="persona" value="{{ $article->outline->persona }}">{{ $article->outline->persona }}</textarea>
                    @if ($errors->has('persona'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('persona') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <h2>本文</h2>
          <div class="card-body">
            <div class="form-group mb-4">
                <label for="lead_title">リード文</label>
                <div class="d-flex d-inline-block mb-2">
                <input type="text" class="form-control {{ $errors->has('lead_title') ? ' is-invalid' : '' }} col-10" id="lead_title" name="lead_title" value="{{ $article->outline->lead_title }}">
                    @if ($errors->has('lead_title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lead_title') }}</strong>
                        </span>
                    @endif
                      <input type="number" name="lead_chars" class="form-control col-1 ml-2"  value="{{ $article->outline->lead_chars }}">
                      <p class="m-1">文字</p>
                </div>
                <textarea rows="5" class="form-control {{ $errors->has('lead') ? ' is-invalid' : '' }}" id="lead" name="lead">{{ $article->outline->lead }}</textarea>
                    @if ($errors->has('lead'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lead') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group mb-4">
                <label for="part1_title">見出し2-1　タイトルと概要</label>
                <div class="d-flex d-inline-block mb-2">
                <input type="text" class="form-control {{ $errors->has('part1_title') ? ' is-invalid' : '' }} col-10" id="part1_title" name="part1_title" value="{{ $article->outline->part1_title }}">
                    @if ($errors->has('part1_title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('part1_title') }}</strong>
                        </span>
                    @endif
                      <input type="part1_chars" class="form-control col-1 ml-2" name="part1_chars" value="{{ $article->outline->part1_chars }}">
                      <p class="m-1">文字</p>
                </div>
                <textarea rows="5" class="form-control {{ $errors->has('part1_summary') ? ' is-invalid' : '' }}" id="part1_summary" name="part1_summary" value="">{{ $article->outline->part1_summary }}</textarea>
                    @if ($errors->has('part1_summary'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('part1_summary') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group mb-4">
                <label for="part2_title">見出し2-2　タイトルと概要</label>
                <div class="d-flex d-inline-block mb-2">
                <input type="text" class="form-control {{ $errors->has('part2_title') ? ' is-invalid' : '' }} col-10" id="part2_title" name="part2_title" value="{{ $article->outline->part2_title }}">
                    @if ($errors->has('part2_title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('part2_title') }}</strong>
                        </span>
                    @endif
                      <input type="part2_chars" class="form-control col-1 ml-2" name="part2_chars" value="{{ $article->outline->part2_chars }}">
                      <p class="m-1">文字</p>
                </div>
                <textarea rows="5" class="form-control {{ $errors->has('part2_summary') ? ' is-invalid' : '' }}" id="part2_summary" name="part2_summary" value="">{{ $article->outline->part2_summary }}</textarea>
                    @if ($errors->has('part2_summary'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('part2_summary') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group mb-4">
                <label for="part3_title">見出し2-3　タイトルと概要</label>
                <div class="d-flex d-inline-block mb-2">
                <input type="text" class="form-control {{ $errors->has('part3_title') ? ' is-invalid' : '' }} col-10" id="part3_title" name="part3_title" value="{{ $article->outline->part3_title }}">
                    @if ($errors->has('part3_title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('part3_title') }}</strong>
                        </span>
                    @endif
                      <input type="part3_chars" class="form-control col-1 ml-2"  name="part3_chars" value="{{ $article->outline->part3_chars }}">
                      <p class="m-1">文字</p>
                </div>
                <textarea rows="5" class="form-control {{ $errors->has('part3_summary') ? ' is-invalid' : '' }}" id="part3_summary" name="part3_summary" value="">{{ $article->outline->part3_summary }}</textarea>
                    @if ($errors->has('part3_summary'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('part3_summary') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group mb-4">
                <label for="conclusion_title">まとめ</label>
                <div class="d-flex d-inline-block mb-2">
                <input type="text" class="form-control {{ $errors->has('conclusion_title') ? ' is-invalid' : '' }} col-10" id="conclusion_title" name="conclusion_title" value="{{ $article->outline->conclusion_title }}">
                    @if ($errors->has('conclusion_title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('conclusion_title') }}</strong>
                        </span>
                    @endif
                      <input type="number" class="form-control col-1 ml-2" name="conclusion_chars" value="{{ $article->outline->conclusion_chars }}">
                      <p class="m-1">文字</p>
                </div>
                <textarea rows="5" class="form-control {{ $errors->has('conclusion') ? ' is-invalid' : '' }}" id="conclusion" name="conclusion" value=""></textarea>
                    @if ($errors->has('conclusion'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('conclusion') }}</strong>
                        </span>
                    @endif
            </div>
            
            <div class="form-group d-flex d-inline-block mb-2">
                <p class="m-1">合計文字数：</p>
                <input type="number" name="total_chars" class="form-control col-1 ml-2">
            </div>
          </div>

        
          <button type="submit" name="submit" class="btn btn-primary">アウトラインを保存する</button>
          <a href="{{ url('/article/update') }}">
            <button type="button" class="btn btn-success">アウトライン申請</button>
          </a>
          <a href="/article/show/{{ $article->id }}">
            <button type="button" class="btn btn-secondary">記事詳細に戻る</button>
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
