@extends('partials.main')

@section('title' , '| Edit')

@section('content')

    {!! Form::model($tag,['route' => ['tags.update', $tag->id], 'method' => 'put']) !!}

        {!! Form::label('name', "Title:") !!}
        {!! Form::text('name', $tag->name , ['class' => 'form-control']) !!}

        {!! Form::submit('Save', ['class' => 'form-control, btn-primary', 'style' => 'margin-top:20px;']) !!}

    {!! Form::close() !!}

@endsection
