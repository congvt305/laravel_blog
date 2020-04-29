@extends('partials.main')

@section('title', "| $post->title" )

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>
@endsection
