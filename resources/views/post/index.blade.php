@extends('layouts.postheader')

@section('content')
<div class="my-5">
    @foreach($articles as $article)
    <div class="card w-75 mx-auto mb-3">
        <div class="container-fluid">
            <div class="row mx-auto">
                <div class="w-100 mx-auto my-2" style="min-height: 20vh; background-image: url('{{ $s3path.$article->thumbnail->file_name }}'); background-size: cover; background-position: center;">
                    <div style=" min-height: 20vh; background-color: rgba(0, 0, 0, 0.2);">
                    </div>
                </div>
                <a href="/post/{{ $article->id }}" style="text-decoration:none;"><h2>{{ $article->title }}</h2></a>
            </div> 
        </div>
    </div>
        
    @endforeach

    {{ $articles->links() }}
</div>

@endsection
