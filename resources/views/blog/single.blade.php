@extends('partials.main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag" )

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <img src="{{ asset('images/' . $post->image) }}" height="400" alt="">
            <h3>{{ $post->title }}</h3>
            <p>{!! $post->body !!} </p>
            <hr>
            <p>Posted In: {{ $post->category['name'] }}</p>
        </div>
    </div>

    <div class="row" style="margin-top: 100px;">
        <div class="col-md-8 offset-md-2">
            <h5 class="comments-title"><svg class="bi bi-chat-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v8a1 1 0 001 1h2.5a2 2 0 011.6.8L8 14.333 9.9 11.8a2 2 0 011.6-.8H14a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v8a2 2 0 002 2h2.5a1 1 0 01.8.4l1.9 2.533a1 1 0 001.6 0l1.9-2.533a1 1 0 01.8-.4H14a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                </svg>
                {{ $post->comments()->count() }} Comments</h5>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img
                            src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}"
                            class="author-image">
                        <div class="author-name">
                            <h5>{{ $comment->name }}</h5>
                            <p class="author-time">{{  date('F nS, Y - g:iA', strtotime($comment->created_at)) }}</p>
                        </div>
                    </div>

                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2" id="comment-form" style="margin-top: 100px;">
            {!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'post']) !!}

            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('comment', 'Comment', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) !!}
                    {!! Form::submit('Add Comment', ['class' => 'btn btn-success', 'style' => "margin-top: 25px;"]) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
