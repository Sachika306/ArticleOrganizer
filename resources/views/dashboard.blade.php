@extends('layouts.mainheader')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <p>こんにちは、{{ Auth::user()->name }}さん</p>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}" target="_blank">公開中サイトを確認（別タブで開きます）</a>
                        </li>
                        @can('admin-user')
                        <li>
                            <a href="{{ url('/member') }}">メンバー一覧</a>
                        </li>
                        @endcan
                        <li>
                            <a href="{{ url('/article') }}">記事一覧</a>
                        </li>
                        <li>
                            <a href="{{ url('/member/setting') }}">設定変更</a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">ログアウト</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
