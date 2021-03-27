@extends('layouts.mainheader')

@section('title', 'メンバー一覧')

@section('content')

<a href="/member/edit/{{ $id }}">
<button type="button" class="btn btn-secondary">編集
</button>
</a>
{{$id}}
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">姓</th>
      <th scope="col">名</th>
      <th scope="col">メールアドレス</th>
      <th scope="col">権限</th>
      <th scope="col">編集</th>
    </tr>
  </thead>
  <tbody>



  </tbody>
</table>

@endsection