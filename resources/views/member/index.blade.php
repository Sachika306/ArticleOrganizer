@extends('layouts.mainheader')

@section('content')


<div class="card w-75 mx-auto">

  <div class="card-header">
    <div>{{ __('メンバー一覧') }}</div>
  </div>
  
      <div class="card-body">
        <a href="{{ url('/register') }}">
          <button type="button" class="btn btn-primary">新規登録</button>
        </a>
      </div>

      <div class="table-responsive-sm card-body">
        <table class="table table-hover">

          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">姓</th>
              <th scope="col">名</th>
              <th scope="col">メールアドレス</th>
              <th scope="col">権限</th>
              <th scope="col">詳細</th>
              <th scope="col">削除</th>
            </tr>
          </thead>

          <tbody>
            @foreach($users as $user)
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->last_name }}</td>
              <td>{{ $user->first_name }}</td>
              <td>{{ $user->email}}</td>
              <td>{{ $user->roles->first()->name }}</td>
              <td><a href="/member/show/{{ $user->id }}">詳細</a></td>
              <td>
                @if($user->id !=  Auth::user()->id )
                  <form action="/member/destroy/{{ $user->id }}" id="delete" method="post">
                  @csrf
                  <button type="submit" id="delete">削除</button>
                  </form>
                @endif
              </td>
            </tr>
            @endforeach

            {{ $users->links() }}

          </tbody>

        </table>
      </div>
  </div>
</div>

@endsection