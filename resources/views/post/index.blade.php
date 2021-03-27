@extends('layouts.postheader')

@section('content')

    @foreach($articles as $article)
    <div class="card w-75 mx-auto mb-3 d">
        <div class="card-body d-flex">
            
            @if($article->thumbnail->file_name !== null)
            <div>
                <img style="max-height: 300px; max-width: 100%; border-radius: 0.25rem; border: 1px solid #ced4da;" src="{{ asset('/storage/thumbnails/'.$article->thumbnail->file_name) }}"> 
            </div>
            @else 
            <!-- <div class="" style="height: 300px; max-width: 100%; border-radius: 0.25rem; border: 1px solid #ced4da;">
                <p>aaaa</p>
            </div> -->
            @endif
            <div class="card-body">
                <a href="/post/{{ $article->id }}"><h2>{{ $article->title }}</h2></a>
            </div>
        </div>
    </div>
        
    @endforeach

    {{ $articles->links() }}



@endsection
