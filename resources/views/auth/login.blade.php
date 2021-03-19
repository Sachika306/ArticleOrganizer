@extends('layouts.main')

@section('title', 'ログイン')

@section('content')

<div>
<form method="post" action="/login">
@csrf

<div>
    <input type="text" name="email" placeholder="メールアドレス">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</div>

<div>
    <input type="password" name="password" placeholder="パスワード">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</div>
        
<input type="submit" value="send">

</form>
</div>
<hr>

@if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('パスワードを忘れた場合はこちらから') }}
    </a>
@endif

@endsection
