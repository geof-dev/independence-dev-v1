@extends('layouts.site')

@section('content')

    <div class="card-columns">

        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="row no-gutters">
                <a href="/post/{{$post->slug}}" class="stretched-link"></a>
                    @if(!empty($post->thumbnail) && file_exists(storage_path('app/public/img/thumbnail/'.$post->thumbnail))) <div class="col-md-8"> @endif
                        <div class="card-body">

                    <h5 class="card-title">@if(!empty($post->youtube_link)) <span style="font-size: 1em; color: #ff0000;"><i class="fab fa-youtube"></i></span> @endif {{$post->title}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                        </div>
                    @if(!empty($post->thumbnail) && file_exists(storage_path('app/public/img/thumbnail/'.$post->thumbnail))) </div> @endif
                    @if(!empty($post->thumbnail) && file_exists(storage_path('app/public/img/thumbnail/'.$post->thumbnail)))
                    <div class="col-md-4 d-none d-md-block">
                        <img class=""  style="border-top-right-radius: .25rem;border-bottom-right-radius: .25rem;height: 100%;width: 100%;object-fit: cover;" src="{{ asset('/storage/img/thumbnail/'.$post->thumbnail) }}" alt="Card image cap">
                    </div>
                    @endif
            </div>
            </div>
        @endforeach
    </div>

@endsection
