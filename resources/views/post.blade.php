@extends('layouts.site')

@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12 border rounded shadow-sm blog-main">

                <div class="blog-post">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                    <p class="blog-post-meta">{{$post->created_at->format('d/m/Y')}}</p>
                    <hr>
                    {!! $post->content !!}
                </div><!-- /.blog-post -->

            </div><!-- /.blog-main -->


        </div><!-- /.row -->

    </main><!-- /.container -->

@endsection
