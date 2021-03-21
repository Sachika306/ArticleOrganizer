@extends('layouts.main')

@section('title', 'ログイン')

@section('content')

<form class="container" method="post" action="/login">
@csrf
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">メールアドレス</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail3">
    </div>
    @error('email')
            <span class="invalid-feedback" role="alert">
                <p><strong>{{ $message }}</strong></p>
            </span>
    @enderror
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">パスワード</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3">
    </div>
    @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror
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
  <button type="submit" value="send" class="btn btn-primary">ログイン</button>

</form>

@endsection
