@extends('layouts.mainheader')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('新規アサイン') }}</div>

                <div class="card-body">
                    <form method="post" action="/article/store" class="container">
                    @csrf

                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('タイトル') }}</label>
                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="outline_user_name" class="col-sm-4 col-form-label text-md-right">{{ __('アウトライン担当者') }}</label>
                            <div class="col-md-6">
                                <input id="outline_user_name" type="text" class="form-control{{ $errors->has('outline_user_id') ? ' is-invalid' : '' }}" placeholder="山田大郎" name="outline_user_name" value="{{ old('outline_user_name') }}">
                                <input type="hidden" name="outline_user_id" value="{{ old('outline_user_id') }}" id="outline_user_id">
                                
                                @if ($errors->has('outline_user_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('outline_user_id')}}</strong>
                                    </span>
                                @else 
                                    @error ('outline_user_name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('outline_user_name') }}</strong>
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="outline_deadline" class="col-sm-4 col-form-label text-md-right">{{ __('アウトライン納期') }}</label>
                            <div class="col-md-6">
                                <input id="outline_deadline" type="text" class="date form-control{{ $errors->has('outline_deadline') ? ' is-invalid' : '' }}" placeholder="2020-01-01" name="outline_deadline" value="{{ old('outline_deadline') }}">
                                @if ($errors->has('outline_deadline'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('outline_deadline') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="article_user_name" class="col-sm-4 col-form-label text-md-right">{{ __('記事担当者') }}</label>
                            <div class="col-md-6">
                                <input id="article_user_name" type="text" class="form-control{{ $errors->has('article_user_id') ? ' is-invalid' : '' }}" placeholder="山田大郎" name="article_user_name" value="{{ old('article_user_name') }}">
                                <input type="hidden" name="article_user_id" value="{{ old('article_user_id') }}" id="article_user_id">
                                
                                @if ($errors->has('article_user_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('article_user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="atcile_deadline" class="col-sm-4 col-form-label text-md-right">{{ __('記事納期') }}</label>
                            
                            <div class="col-md-6">
                                <input id="article_deadline" type="text" class="date form-control{{ $errors->has('article_deadline') ? ' is-invalid' : '' }}" placeholder="2020-01-01" name="article_deadline" value="{{ old('article_deadline') }}">
                                <small>※記事納期はアウトライン納期よりあとの日付を選択してください。</small>
                                @if ($errors->has('article_deadline'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('article_deadline') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <a href="/article"><button type="button" class="btn btn-secondary" onclick="submit();">一覧に戻る</button></a>
                      <button type="button" name="submitBtn" class="btn btn-primary" onclick="submit();">登録する</button>
                      
                  </form>
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
