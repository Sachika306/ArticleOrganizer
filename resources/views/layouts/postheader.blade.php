<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @if(config('app.env') == 'local')
      <!-- Bootstrap Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <!-- BootStrap Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
    @if(config('app.env') == 'production')
      <!-- Bootstrap Scripts -->
      <script src="{{ secure_asset('js/app.js') }}" defer></script>
      <!-- BootStrap Styles -->
      <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @endif
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>
<div id="app"></div> 

{{-- ナビゲーションバー部分 --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/') }}">インバウンド情報サイト</a>
</nav>

{{-- ヘッダー画像部分 --}}
<div class="" style="background-image: url('https://articleorganizer.s3-ap-northeast-1.amazonaws.com/header/postindexheader.jpg'); background-size: cover; background-position: center;">
  <div style="position:relative; height: 50vh; width:100%; background-color: rgba(0, 0, 0, 0.3);">
    <h1 class="position-absolute mx-auto display-4 text-light" style="font-weight: bold; top: 50%; left: 50%; transform: translateY(-50%) translateX(-50%); -webkit- transform: translateY(-50%) translateX(-50%);">インバウンド情報サイト</h1>
  </div>
</div>

{{-- メッセージ表示部分 --}}
@if(session('message'))
<div class="card-body mx-auto">
    <div class="row justify-content-center">
            <div class="alert alert-success w-75 mx-auto" role="alert">
              <p>{{session('message')}}</p>
            </div>
    </div>
</div>
@endif

@yield('content')

@yield('footer')


<script type="text/javascript">
  var outlineUserNames = @json($outlineUserNames);
  var articleUserNames = @json($articleUserNames);
</script>
</body>
</html>


    
