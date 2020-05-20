@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Ajout d'un article
                    </div>
                    <div style="padding: 10px">
                        {!! Form::open(['url' => route('post.store'), 'files' => true]) !!}
                        @csrf
                        <div class="form-group">
                            {!! Form::label('title', 'Titre : ') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category : ') !!}
                            {!! Form::select('category_id', $categories, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('youtube_link', 'Lien YouTube : ') !!}
                            {!! Form::text('youtube_link', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description : ') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Contenu : ') !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('thumbnail', 'Thumbnail : ') !!}
                            {!! Form::file('thumbnail') !!}
                        </div>
                        <div class="form-group">
                            <label>
                                {!! Form::checkbox('online', 1, ['class' => 'form-control']) !!}
                                Online ?
                            </label>
                        </div>
                        {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea#content',
            width: 1000,
            height: 300
        });
    </script>
@endsection
