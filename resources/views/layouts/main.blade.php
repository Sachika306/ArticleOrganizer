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
  <a class="navbar-brand" href="{{ url('/article') }}">記事管理アプリ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @if(Auth::check())
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/member') }}">メンバー一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/article') }}">記事一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/logout') }}">ログアウト</a>
        </li>
        <li class="nav-item">
          <p class="nav-link">{{ Auth::user()->name }}</p>
        </li>
      </ul>
  </div>
  @endif
</nav>

<h1>@yield('title')</h1>

@yield('content')

@yield('footer')


</body>
</html>


    
