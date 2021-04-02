<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- BootStrap Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>
<div id="app"></div> 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/dashboard') }}">記事管理アプリ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  @if(Auth::check())
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @can('admin-user') 
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/member') }}">メンバー一覧<span class="sr-only">(current)</span></a>
          </li>
        @endcan
        @can('all-users')
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/article') }}">記事一覧</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/member/setting') }}">設定</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}">ログアウト</a>
          </li>
        @endcan
      </ul>
  </div>
  @endif
</nav>

<h1>@yield('title')</h1>

@if(session('message'))
<div class="card-body mx-auto">
    <div class="row justify-content-center">
            <div class="alert alert-success w-75 mx-auto" role="alert">
              <p>{{session('message')}}</p>
            </div>
    </div>
</div>
@endif

@if(session('message_error'))
<div class="card-body mx-auto">
    <div class="row justify-content-center">
            <div class="alert alert-danger w-75 mx-auto" role="alert">
              <p>{{session('message_error')}}</p>
            </div>
    </div>
</div>
@endif

@yield('content')

<div class="w-100 p-3 fixed-bottom" style="background-color: #eee;">
@yield('footer')
</div>

<script type="text/javascript">
  var outlineUserNames = @json($outlineUserNames);
  var articleUserNames = @json($articleUserNames);
</script>
</body>
</html>



    
