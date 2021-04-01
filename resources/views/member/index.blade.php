@extends('layouts.mainheader')

@section('content')


<div class="card w-100 mx-auto">
  <div class="card-header d-flex justify-content-between">
    <div>{{ __('メンバー一覧') }}
    </div>
  </div>

      <div class="table-responsive-sm card-body">
        @can('admin-user')
        <div>
          <a href="{{ url('/register') }}">
            <button type="button" class="btn btn-primary float-right mb-3">新規登録</button>
          </a>
        </div>
        @endcan
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
                  <form action="/member/destroy/{{ $user->id }}" class="delete" method="post">
                  @csrf
                  <button type="submit">削除</button>
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