@extends('layouts.mainheader')

@section('content')

<div class="card w-75 mx-auto" id="MyOutline">

  <div class="card-body">
    <form method="post" action="/outline/update/{{ $article->id }}" enctype="multipart/form-data" class="w-75 mx-auto">
    @csrf

        <h2>基本情報</h2>
        <div class="card-body">
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ !empty(old('title')) ? old('title') : $article->title }}" placeholder="例：カイロプラクティックでGoogleマイビジネスを活用する方法｜意識すべき点もあわせて解説">
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group">
                <label for="persona">ペルソナ</label>
                <textarea rows="7" class="form-control {{ $errors->has('persona') ? ' is-invalid' : '' }}" id="persona" name="persona" value="" placeholder="※この記事を読み参考にする人の人物像を説明">{{ !empty(old('persona')) ? old('persona') : $article->outline->persona }}</textarea>
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
                <label for="lead_kw">リード文に含むキーワード・導入文の文字数目安</label>
                <div class="d-flex d-inline-block mb-2">
                    <input type="text" class="form-control {{ $errors->has('lead_kw') ? ' is-invalid' : '' }} col-8" id="lead_kw" name="lead_kw" value="{{ !empty(old('lead_kw')) ? old('lead_kw') : $article->outline->lead_kw }}" placeholder="例：「Googleマイビジネス」">
                        @if ($errors->has('lead_kw'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('lead_kw') }}</strong>
                            </span>
                        @endif
                    <input type="number" name="lead_chars" class="form-control col-3 ml-2 txtCal {{ $errors->has('lead_chars') ? ' is-invalid' : '' }}"  value="{{ !empty(old('lead_chars')) ? old('lead_chars') : $article->outline->lead_chars }}">
                    <p class="m-1">文字</p>
                        @if ($errors->has('lead_chars'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('lead_chars') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="part1_title">見出し2-1　タイトルと概要</label>
                <div class="d-flex d-inline-block mb-2">
                    <input type="text" class="form-control {{ $errors->has('part1_title') ? ' is-invalid' : '' }} col-8" id="part1_title" name="part1_title" value="{{ !empty(old('part1_title')) ? old('part1_title') : $article->outline->part1_title }}" placeholder="例：カイロプラティックにGoogleマイビジネスの運用が必要な4つの理由">
                        @if ($errors->has('part1_title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('part1_title') }}</strong>
                            </span>
                        @endif
                    <input type="number" class="form-control col-3 ml-2 txtCal {{ $errors->has('part1_chars') ? ' is-invalid' : '' }}" name="part1_chars" value="{{ !empty(old('part1_chars')) ? old('part1_chars') : $article->outline->part1_chars }}">
                    <p class="m-1">文字</p>
                        @if ($errors->has('part1_chars'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('part1_chars') }}</strong>
                            </span>
                        @endif
                </div>
                <textarea rows="15" class="form-control {{ $errors->has('part1_summary') ? ' is-invalid' : '' }}" id="part1_summary" name="part1_summary" value="" placeholder="本文の内容を指示してください。">{{ !empty(old('part1_summary')) ? old('part1_summary') : $article->outline->part1_summary }}</textarea>
                    @if ($errors->has('part1_summary'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('part1_summary') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group mb-4">
                <label for="part2_title">見出し2-2　タイトルと概要</label>
                <div class="d-flex d-inline-block mb-2">
                    <input type="text" class="form-control {{ $errors->has('part2_title') ? ' is-invalid' : '' }} col-8" id="part2_title" name="part2_title" value="{{ !empty(old('part2_title')) ? old('part2_title') : $article->outline->part2_title }}" placeholder="例：カイロプラティックがGoogleマイビジネスを運用する上で最初にすべきこと3選">
                        @if ($errors->has('part2_title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('part2_title') }}</strong>
                            </span>
                        @endif
                    <input type="number" class="form-control col-3 ml-2 txtCal {{ $errors->has('part2_chars') ? ' is-invalid' : '' }}" name="part2_chars" value="{{ !empty(old('part2_chars')) ? old('part2_chars') : $article->outline->part2_chars }}">
                    <p class="m-1">文字</p>
                        @if ($errors->has('part2_chars'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('part2_chars') }}</strong>
                            </span>
                        @endif
                </div>
                <textarea rows="15" class="form-control {{ $errors->has('part2_summary') ? ' is-invalid' : '' }}" id="part2_summary" name="part2_summary" value="" placeholder="本文の内容を指示してください。">{{ !empty(old('part2_summary')) ? old('part2_summary') : $article->outline->part2_summary }}</textarea>
                    @if ($errors->has('part2_summary'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('part2_summary') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group mb-4">
                <label for="part3_title">見出し2-3　タイトルと概要</label>
                <div class="d-flex d-inline-block mb-2">
                    <input type="text" class="form-control {{ $errors->has('part3_title') ? ' is-invalid' : '' }} col-8" id="part3_title" name="part3_title" value="{{ !empty(old('part3_title')) ? old('part3_title') : $article->outline->part3_title }}" placeholder="例：カイロプラクティックがGoogleマイビジネスを運用する上で意識すべきこと4選">
                        @if ($errors->has('part3_title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('part3_title') }}</strong>
                            </span>
                        @endif
                    <input type="number" class="form-control col-3 ml-2 txtCal {{ $errors->has('part3_chars') ? ' is-invalid' : '' }}"  name="part3_chars" value="{{ !empty(old('part3_chars')) ? old('part3_chars') : $article->outline->part3_chars }}">
                        <p class="m-1">文字</p>
                        @if ($errors->has('part3_chars'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('part3_chars') }}</strong>
                            </span>
                        @endif
                </div>
                <textarea rows="15" class="form-control {{ $errors->has('part3_summary') ? ' is-invalid' : '' }}" id="part3_summary" name="part3_summary" value="" placeholder="本文の内容を指示してください。">{{ !empty(old('part3_summary')) ? old('part3_summary') : $article->outline->part3_summary }}</textarea>
                    @if ($errors->has('part3_summary'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('part3_summary') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group mb-4">
                <label for="conclusion_title">まとめ</label>
                    @if ($errors->has('conclusion_title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('conclusion_title') }}</strong>
                        </span>
                    @endif
                <div class="d-flex d-inline-block mb-2">
                <input type="text" class="form-control {{ $errors->has('conclusion_title') ? ' is-invalid' : '' }} col-8" id="conclusion_title" name="conclusion_title" value="{{ !empty(old('conclusion_title')) ? old('conclusion_title') : $article->outline->conclusion_title }}" placeholder="カイロプラクティックの集客対策にGoogleマイビジネスの活用を">
                      <input type="number" class="form-control col-3 ml-2 txtCal {{ $errors->has('conclusion_chars') ? ' is-invalid' : '' }}" name="conclusion_chars" value="{{ !empty(old('conclusion_chars')) ? old('conclusion_chars') : $article->outline->conclusion_chars }}">
                      <p class="m-1">文字</p>
                      @if ($errors->has('conclusion_chars'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('conclusion_chars') }}</strong>
                        </span>
                    @endif
                </div>
                <textarea rows="4" class="form-control {{ $errors->has('conclusion') ? ' is-invalid' : '' }}" id="conclusion" name="conclusion" value="" placeholder="まとめに含めて欲しい内容を指示してください。">{{ !empty(old('conclusion')) ? old('conclusion') : $article->outline->conclusion }}</textarea>
            </div>
            
            <div class="form-group d-flex d-inline-block mb-2">
                <p class="m-1">合計文字数：</p>
                <input type="number" name="total_chars" class="form-control col-3 ml-2 totalchars {{ $errors->has('total_chars') ? ' is-invalid' : '' }}" value="{{ $article->outline->total_chars }}" readonly>
            </div>
          </div>
        
          <button type="submit" name="submit" class="btn btn-primary">アウトラインを保存する</button>
          <a href="{{ route('article.show.id', ['id' => $article->id] ) }}">
            <button type="button" class="btn btn-secondary">記事詳細に戻る</button>
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
