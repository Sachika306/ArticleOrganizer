@extends('layouts.postheader')

@section('content')

<div class="card w-75 mx-auto">
  <div class="card-body">
    
        <div class="card-body title-wrapper">
          <div>
            <h2 class="display-6">{{ $article->title }}</h2>
            <hr>
          </div>
        
          @isset($article->thumbnail->file_name)
          <div class="form-group mx-auto">
              <img style="width: 1280px; height: 300px; object-fit: cover; object-position: left top; border-radius: 0.25rem; border: 1px solid #ced4da;" src="{{ asset('/storage/thumbnails/'.$article->thumbnail->file_name) }}"> 
          </div>
          @endisset
          <div>
            {!! $article->content !!}
          </div>
        
        </div>

        <div class="card-body">
          <a href="{{ url('/') }}">
            <button type="button" class="btn btn-secondary">一覧に戻る</button>
          </a>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection