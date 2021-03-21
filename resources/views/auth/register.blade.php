@extends('layouts.main')

@section('title', 'メンバー新規登録')

@section('content')
<form method="post" action="/register" class="container">
@csrf

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">姓</span>
  </div>
  <input type="text" name="last_name" value="{{ old('last_name')}}" class="form-control" placeholder="山田">
</div>

@error('last_name')
  <p>{{ $message }}</p>
@enderror


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">名</span>
  </div>
  <input type="text" name="first_name" value="{{ old('first_name')}}" class="form-control" placeholder="大郎">
</div>

@error('first_name')
  <p>{{ $message }}</p>
@enderror


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">メールアドレス</span>
  </div>
  <input type="text" name="email" value="{{ old('email')}}" class="form-control" placeholder="sample@gmail.com">
</div>

@error('email')
  <p>{{ $message }}</p>
@enderror


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">パスワード</span>
  </div>
  <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="password">
</div>

@error('password')
  <p>{{ $message }}</p>
@enderror


<select class="custom-select" name="role_id">
        <option value="">付与する権限</option>
            @foreach($roles as $role => $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
</select>

@error('role_id')
  <p>{{ $message }}</p>
@enderror

<input type="submit" name="submit" class="btn btn-primary">
  


</form>
@endsection