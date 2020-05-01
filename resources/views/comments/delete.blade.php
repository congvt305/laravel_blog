@extends('partials.main')

@section('title', '| Delete Comment')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Are you sure to delete this comment?</h1>
            <p>
                <strong>Name: </strong> {{ $comment->name }}<br>
                <strong>Email: </strong> {{ $comment->email }}<br>
                <strong>Comment: </strong> {{ $comment->comment }}<br>
            </p>

            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            <a href="{{ route('posts.show', $comment->post->id) }}" class="btn btn-primary">Back</a>
        </div>
    </div>

@endsection
