@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('post.create')}}" type="button" class="btn btn-outline-success float-right">Ajouter un article</a>
                    Gestion des articles
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Supprimer</th>
                                <th scope="col">En ligne</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                                <td>{{$post->category->name}}</td>
                                <td>
                                    {!! Form::open(['method' => 'delete', 'url' => route('post.destroy', $post->id)]) !!}
                                    @csrf
                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-outline-danger text-right']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {{$post->online}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
