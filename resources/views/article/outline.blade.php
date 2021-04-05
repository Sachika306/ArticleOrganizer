@extends('layouts.mainheader')

@section('content')

<div class="card w-75 mx-auto">
  <div class="card-body">
    
        <div class="card-body title-wrapper">
          <div>
            <h2 class="display-6">{{ $article->title }}</h2>
            <hr>
          </div>

        <div class="card-body">
            <h2>ペルソナ</h2>
            <hr>
            <textarea name="" class="form-control" id="" cols="30" rows="10" readonly>{{ $outline->persona }}</textarea>
        </div>

        <div class="card-body">
            <h2>リード文のキーワード・文字数</h2>
            <hr>
            <div class="d-flex d-inline-block mb-1">
                <h3 class="form-control  col-10 mr-2">{{$outline->lead_kw}}</h3>
                <p class="form-control">{{ $outline->lead_chars }}文字</p>
            </div>
            <small>※上記キーワードを含んで、指定の文字数で導入文を書いてください。</small>
        </div>

        <div class="card-body">
            <h2>見出し2-1</h2>
            <hr>
            <div class="d-flex d-inline-block mb-1">
                <h3 class="form-control  col-10 mr-2">{{$outline->part1_title}}</h3>
                <p class="form-control">{{ $outline->part1_chars }}文字</p>
            </div>
            <textarea name="" class="form-control" id="" cols="30" rows="10" readonly>{{ $outline->part1_summary }}</textarea>
        </div>

        <div class="card-body">
            <h2>見出し2-2</h2>
            <hr>
            <div class="d-flex d-inline-block mb-1">
                <h3 class="form-control  col-10 mr-2">{{$outline->part2_title}}</h3>
                <p class="form-control">{{ $outline->part2_chars }}文字</p>
            </div>
            <textarea name="" class="form-control" id="" cols="30" rows="10" readonly>{{ $outline->part2_summary }}</textarea>
        </div>

        <div class="card-body">
            <h2>見出し2-3</h2>
            <hr>
            <div class="d-flex d-inline-block mb-1">
                <h3 class="form-control  col-10 mr-2">{{$outline->part3_title}}</h3>
                <p class="form-control">{{ $outline->part3_chars }}文字</p>
            </div>
            <textarea name="" class="form-control" id="" cols="30" rows="10" readonly>{{ $outline->part3_summary }}</textarea>
        </div>

        <div class="card-body">
            <h2>まとめ</h2>
            <hr>
            <div class="d-flex d-inline-block mb-1">
                <h3 class="form-control  col-10 mr-2">{{$outline->conclusion_title}}</h3>
                <p class="form-control">{{ $outline->conclusion_chars }}文字</p>
            </div>
            <textarea name="" class="form-control" id="" cols="30" rows="10" readonly>{{ $outline->conclusion }}</textarea>
        </div>
        <div class="card-body">
            <h2>本記事の合計文字数</h2>
            <hr>
            <p class="form-control">{{ $outline->total_chars }}文字</p>
        </div>
        <div class="card-body">
          <a href="{{ route('article.show.id', ['id' => $article->id] ) }}">
            <button type="button" class="btn btn-secondary">一覧に戻る</button>
          </a>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
