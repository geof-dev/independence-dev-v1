@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Modifier l'article
                    </div>
                    <div style="padding: 10px">
                    {!! Form::open(['method' => 'put', 'url' => route('post.update', $post->id), 'files' => true]) !!}
                    @csrf
                        {!! Form::hidden('online', 0) !!}
                    <div class="form-group">
                    {!! Form::label('title', 'Titre : ') !!}
                    {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('youtube_link', 'Lien YouTube : ') !!}
                        {!! Form::text('youtube_link', $post->youtube_link, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', 'Category : ') !!}
                        {!! Form::select('category_id', $categories, $post->category_id, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('description', 'Description : ') !!}
                    {!! Form::textarea ('description', $post->description, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('content', 'Contenu : ') !!}
                    {!! Form::textarea('content', $post->content, ['class' => 'form-control']) !!}
                    </div>
                        @if(!empty($post->thumbnail) && file_exists(storage_path('app/public/img/thumbnails/'.$post->thumbnail)))
                            <div class="col-md-4 d-none d-md-block">
                                <img class=""  style="border-top-right-radius: .25rem;border-bottom-right-radius: .25rem;height: 100%;width: 100%;object-fit: cover;" src="{{ asset('/storage/img/thumbnails/'.$post->thumbnail) }}" alt="Card image cap">
                            </div>
                        @endif
                    <div class="form-group">
                        {!! Form::label('thumbnail', 'Thumbnail : ') !!}
                        {!! Form::file('thumbnail') !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('online', 1, $post->online, ['class' => 'form-control']) !!}
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
            plugins: 'image',
            width: 1000,
            height: 300,
            file_picker_types: 'image',
            images_upload_handler: function (blobInfo, success, failure) {
                let data = new FormData();
                data.append('file', blobInfo.blob(), blobInfo.filename());
                data.append('id', '{!! $post->id !!}');
                axios.post('/admin/image-upload', data)
                    .then(function (res) {
                        success(res.data.location);
                    })
                    .catch(function (err) {
                        failure('HTTP Error: ' + err.message);
                    });
            }
        });
    </script>

@endsection
