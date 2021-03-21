@extends('layouts.main')

@section('title', 'ログイン')

@section('content')

<form class="container" method="post" action="/login" novalidate>
@csrf
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">メールアドレス</label>
    <div class="col-sm-10">
      <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="inputEmail3">
      @error('email')
            <p>{{$message}}</p>
      @enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">パスワード</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3">
      @error('password')
            <p>{{$message}}</p>
      @enderror
      @error('message')
            <p>{{$message}}</p>
      @enderror
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          ログイン情報を保存する
        </label>
      </div>
    </div>
  </div>

  <div class="row mb-3">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れた場合はこちらから') }}
            </a>
        @endif
  </div>
  <button type="submit" value="send" name="submit" class="btn btn-primary">送信</button>

</form>

@endsection
