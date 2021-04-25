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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>
<div id="app"></div> 

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="{{ url('/dashboard') }}">外注記事管理アプリ</a>
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
            <a class="nav-link" href="{{ url('/member/setting') }}">設定変更</a>
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

<div class="m-4 min-vh-100">
@yield('content')
</div>

@can('guest-user')
<div class="mxーauto bg-light p-3 border" style="position: absolute; position:fixed; bottom: 5%; right: 3%; opacity: 0.95;"> 
      <form method="post" class="d-flex" action="{{ route('update.guest') }}">
        @csrf
          <select class="mr-1 custom-select col {{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id">
              <option value="{{ Auth::user()->roles->first()->id }}">{{ Auth::user()->roles->first()->name }}</option>
                @foreach($roles as $role => $value)
                    @if($value->name !== "" && $value->id !== Auth::user()->roles->first()->id)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endif
                @endforeach
          </select>
          <button type="submit" class="btn btn-success">表示切替</button>
      </form>
      <small class="">※別の権限での表示を確認できます。</small>
  </div>
  
</div>
@endcan


<div class="justify-content d-flex align-self my-auto">
  <div class="w-100 p-5" style="background-color: #eee;">
    @yield('footer')
  </div>
</div>

<script type="text/javascript">
  var outlineUserNames = @json($outlineUserNames);
  var articleUserNames = @json($articleUserNames);
</script>
</body>
</html>



    
