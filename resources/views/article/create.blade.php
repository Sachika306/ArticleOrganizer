@extends('layouts.main')

@section('title', '新規記事登録')

@section('content')
<form method="post" action="/article/store" class="container">
@csrf

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="title">タイトル</span>
  </div>
  <input type="text" name="title" value="{{ old('title')}}" class="form-control" placeholder="40文字以内">
</div>

@error('title')
  <p>{{ $message }}</p>
@enderror

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon2">アウトライン担当者</span>
  </div>
  <input type="text" value="{{ old('outline_user_name')}}" class="form-control outline_user_name" placeholder="山田大郎" id="outline_user_name">
  <input type="hidden" name="outline_user_id" value="{{ old('outline_user_id')}}" id="outline_user_id">
</div>

@error('outline_user_id')
  <p>{{ $message }}</p>
@enderror

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">アウトラインURL</span>
  <input type="text" name="outline_url" value="{{ old('outline_url')}}" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

@error('outline_url')
  <p>{{ $message }}</p>
@enderror

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">アウトライン納期</span>
  <input type="text" name="outline_deadline" value="{{ old('outline_deadline')}}" class="date form-control" id="basic-datepicker1" aria-describedby="basic-addon3">
</div>

@error('outline_deadline')
  <p>{{ $message }}</p>
@enderror

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">記事担当者</span>
  </div>
  <input type="search" value="{{ old('article_user_name')}}" class="form-control article_user_name" placeholder="山田大郎">
  <input type="hidden" name="outline_user_id" value="{{ old('outline_user_id')}}" id="outline_user_id">
</div>

@error('article_user_id')
  <p>{{ $message }}</p>
@enderror

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">記事URL</span>
  <input type="text" name="article_url" value="{{ old('article_url')}}" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

@error('article_url')
  <p>{{ $message }}</p>
@enderror

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">記事納期</span>
  <input type="text" name="article_deadline" value="{{ old('article_deadline')}}" class="date form-control" id="basic-datepicker2" aria-describedby="basic-addon3">
</div>

@error('article_deadline')
  <p>{{ $message }}</p>
@enderror

<input type="submit" name="submit" class="btn btn-primary">

</form>
@endsection

<script type="text/javascript">
var outlineUserNames = @json($outlineUserNames);
var articleUserNames = @json($articleUserNames);
</script>
