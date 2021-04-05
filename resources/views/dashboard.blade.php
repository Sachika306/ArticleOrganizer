@extends('layouts.mainheader')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <p>こんにちは、{{ Auth::user()->name }}さん</p>
           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
