@extends('partials.main')

@section('title', '| Edit comment')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Comment</h1>

            {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}

            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) !!}

            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) !!}

            {!! Form::label('comment', 'Comment', ['class' => 'control-label']) !!}
            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}

            {!! Form::submit('Update', ['class' => 'btn btn-success', 'style' => 'margin-top: 15px;']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
