@extends('layouts.mainheader')

@section('content')

<div class="card w-75 mx-auto">
  <div class="card-body">
    
      <div class="card-body">
        <div>
          <div class="d-flex">
            @can('admin-user')
              @if($article->status_id == 4)
              <form method="post" action="/outline/approve/{{ $article->id }}" class="approve">
                @csrf
                <button type="submit" class="btn btn-success mr-1">承認する</button>
              </form>
              <form method="post" action="/outline/decline/{{ $article->id }}" class="decline">
                @csrf
                <button type="submit" class="btn btn-danger mr-1">修正依頼</button>
              </form>
              @elseif($article->status_id == 7)
              <form method="post" action="/article/approve/{{ $article->id }}" class="approve">
                @csrf
                <button type="submit" class="btn btn-success mr-1">承認する</button>
              </form>
              <form method="post" action="/article/decline/{{ $article->id }}" class="decline">
                @csrf
                <button type="submit" class="btn btn-danger mr-1">修正依頼</button>
              </form>
              @elseif($article->status_id == 8)
                @if($article->publish_flg == 0)
                <form method="post" action="/article/publish/{{ $article->id }}" id="publish">
                  @csrf
                  <button type="submit" class="btn btn-success mr-1">公開する</button>
                </form>
                @elseif($article->publish_flg == 1)
                <form method="post" action="/article/withhold/{{ $article->id }}" id="withhold">
                  @csrf
                  <button type="submit" class="btn btn-secondary mr-1">非公開にする</button>
                </form>
                @endif
              @endif

            @elsecan('article-user')
              @if($article->status_id == 5 || $article->status_id == 6)
                <a href="/article/edit/{{ $article->id }}">
                  <button type="button" class="btn btn-primary mr-1">記事編集</button>
                </a>
              @endif
            @elsecan('outline-user')
              @if($article->status_id < 4)
                <a href="/outline/edit/{{ $article->id }}">
                  <button type="button" class="btn btn-primary mr-1">アウトライン編集</button>
                </a>
              @endif
            @endcan

            @if($article->publish_flg == 1)
              <a href="/post/{{ $article->id }}" target="_blank">
                <button type="button" class="btn btn-primary mr-1">公開URL</button>
              </a>
            @else
              <a href="/article/preview/{{ $article->id }}" target="_blank">
                <button type="button" class="btn btn-secondary mr-1">プレビュー</button>
              </a>
            @endif
          </div>
        </div>
      </div>
    
        <div class="card-body">
          <div class="mb-5">
            <h2 class="display-6 d-inline-block">ID:{{ $article->id }} {{ $article->title }}</h2>
              <span class="text-light ml-3">
                  @include('layouts.article.status')
                      {{ $article->status->name }}
                  </div>
              </span>
                @if($article->publish_flg == 1)
                  <span class="text-light">
                      <div class="badge bg-info text-wrap p-2" style="width: 80px;">
                      公開済み
                      </div>
                  </span>
                @endif
              <hr>
          </div>

          <div class="mb-5">
            <h3 class="display-6">画像</h3>
            @isset($article->thumbnail->file_name)
            <div class="form-group">
              <img style="max-height: 500px; max-width: 100%; object-fit: cover; object-position: center; max-width: 100%; border-radius: 0.25rem; border: 1px solid #ced4da;" src="{{ asset('/storage/thumbnails/'.$article->thumbnail->file_name) }}"> 
            </div>
            @else 
            <div class="form-group" style="height: 300px; width: 100%; object-fit: cover; object-position: left top; max-width: 100%; border-radius: 0.25rem; border: 1px solid #ced4da; background-color: gray;">
              <div>
               <p class="center">画像が未設定です。</p>
              </div>
            </div>
            @endisset
          </div>

          <div class="mb-5">
            <h3 class="display-6">アウトライン</h3>
            <div class="form-control" style="height:auto;">
             {{ $article->outline->persona }}<a href="/article/outline/{{ $article->id }}">アウトラインプレビュー</a>
            </div>
          </div>

          <div class="mb-5">
            <h3 class="display-6">記事本文</h3>
            <div class="form-control" style="height:auto;">
            @isset($article->content)
              {{ Str::limit(($article->content), 300) }}
            @else
              <p>記事本文がまだありません。</p>
            @endisset
            </div>
          </div>

          <div class="mb-5">
            <h3 class="display-6">担当者</h3>
                <form method="post" action="/article/reassign/{{ $article->id }}" class="">
                  @csrf

                  <div class="d-sm-flex mb-2">
                      <div class="col-sm-2 text-sm-right align-self-center">
                        <label for="outline_user_name align-middle">アウトライン担当</label>
                      </div>
                      
                      <input id="outline_user_name" type="text" class="form-control mb-2 col {{ $errors->has('outline_user_id') ? ' is-invalid' : '' }}" placeholder="山田大郎" name="outline_user_name" value="{{ $users->find($article->outlineassignment->outline_user_id)->name }}" {{ Gate::allows('admin-user') ?  : 'readonly' }}>
                        <input type="hidden" name="outline_user_id" value="{{ $users->find($article->outlineassignment->outline_user_id)->id }}" id="outline_user_id">              
                        @if ($errors->has('article_user_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('outline_user_id') }}</strong>
                            </span>
                        @endif
                  </div>

                  <div class="d-sm-flex mb-2">
                      <div class="col-sm-2 text-sm-right align-self-center">
                        <label for="article_user_name text">記事担当</label>
                      </div>
                      <input id="article_user_name" type="text" class="form-control mb-2 col {{ $errors->has('article_user_id') ? ' is-invalid' : '' }}" placeholder="山田大郎" name="article_user_name" value="{{ $users->find($article->articleassignment->article_user_id)->name }}" {{ Gate::allows('admin-user') ?  : 'readonly' }}>
                          <input type="hidden" name="article_user_id" value="{{ $users->find($article->articleassignment->article_user_id)->id }}" id="article_user_id">              
                          @if ($errors->has('article_user_id'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('article_user_id') }}</strong>
                              </span>
                        @endif
                    </div>
                  
                  @if($article->status_id < 8 )
                    @can('admin-user')
                    <button type="button" name="submitBtn" class="btn btn-primary float-right" onclick="submit();">担当者変更</button>
                    @endcan
                  @endif
                </form>
              
              
          </div>
        
        </div>

        <div class="card-body d-flex">
          <a href="{{ url('/article') }}">
            <button type="button" class="btn btn-secondary mr-1">一覧に戻る</button>
          </a>
          @can('admin-user')
          @elsecan('article-user')
            @if($article->status_id == 5 || $article->status_id == 6 )
            <form method="post" action="/article/submit/{{ $article->id }}" id="submit">
              @csrf
              <button type="submit" class="btn btn-success mr-1">記事申請</button>
            </form>
            @endif
          @elsecan('outline-user')
            @if($article->status_id == 2 || $article->status_id == 3)
            <form method="post" action="/outline/submit/{{ $article->id }}" id="submit">
              @csrf
              <button type="submit" class="btn btn-success mr-1">アウトライン申請</button>
            </form>
            @endif
          @endcan
        </div>
        
      </div>
    </div>
  </div>
</div>


@endsection
<script type="text/javascript">
var outlineUserNames = @json($outlineUserNames);
var articleUserNames = @json($articleUserNames);
</script>