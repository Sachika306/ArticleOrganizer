@extends('layouts.mainheader')

@section('content')


<div class="card w-75 mx-auto">

  <div class="card-header">
    <div>{{ __('設定') }}</div>
  </div>
  
      <div class="card-body">

      <form method="post" action="/member/setting/update" class="container" novalidate>
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}"></input>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('姓') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ Auth::user()->last_name }}" {{ Auth::user()->email == 'guest@example.com' && Auth::user()->name =='山田 大郎' ? 'readonly' : '' }}>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('名') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ Auth::user()->first_name }}" {{ Auth::user()->email == 'guest@example.com' && Auth::user()->name =='山田 大郎' ? 'readonly' : '' }}>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email}}" {{ Auth::user()->email == 'guest@example.com' && Auth::user()->name =='山田 大郎' ? 'readonly' : '' }}>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                @if(Auth::user()->email == 'guest@example.com' && Auth::user()->name == '山田 大郎')
                                <p>※ゲストユーザーの設定変更はできません。</p>
                                <button type="button" on="return false;" name="submit" class="btn btn-primary">送信</button>
                                @else
                                 <button type="submit" name="submit" class="btn btn-primary">送信</button>
                                @endif
                            </div>
                        </div>


                    </form>
      </div>
  </div>
</div>

@endsection



