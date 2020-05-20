@extends('layouts.site')

@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12 border rounded shadow-sm blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                    <p class="blog-post-meta">{{$post->created_at->format('d/m/Y')}}</p>
                    <hr>
                    @if(!empty($post->youtube_link))
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{!! $post->youtube_link !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                    {!! $post->content !!}
                </div><!-- /.blog-post -->
            </div><!-- /.blog-main -->
        </div><!-- /.row -->
    </main><!-- /.container -->

@endsection
