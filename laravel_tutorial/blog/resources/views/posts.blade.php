
@extends('layout')

@section('content')


@foreach($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{$post->id}}">
                {{$post->title}}
            </a>
        <div>
            {{$post->excerpt}}
        </div>    
    </article>
@endforeach


@endsection


