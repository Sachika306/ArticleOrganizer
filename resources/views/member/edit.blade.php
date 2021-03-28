@extends('layouts.mainheader')

@section('title', 'メンバー編集')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('メンバー編集') }}</div>

                <div class="card-body">

<form method="post" action="/member/setting/update">
@csrf

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">名</span>
  </div>
  <input type="text" name="first_name" class="form-control" placeholder="大郎" aria-label="first_name" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">メールアドレス</span>
  </div>
  <input type="text" name="email" class="form-control" placeholder="sample@gmail.com" aria-label="email" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">パスワード</span>
  </div>
  <input type="text" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon1">
</div>

<select class="custom-select" name="role_id">
  <option selected>権限</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>

<input type="submit" name="submit" class="btn btn-primary">
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
