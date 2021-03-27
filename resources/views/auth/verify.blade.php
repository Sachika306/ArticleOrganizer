@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.mainheader')

@section('title', 'ログイン')

@section('content')

<form class="container" method="post" action="/login">
@csrf
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">メールアドレス</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail3">
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
  <button type="button" value="send" name="submitBtn" class="btn btn-primary" onclick="submit();">送信</button>

</form>

@endsection
