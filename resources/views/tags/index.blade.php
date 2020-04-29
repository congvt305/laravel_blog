@extends('partials.main')

@section('title', '| Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <th><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></th>
                        <th>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card col-md-3">
            <div class="card-body">
                {!! Form::open(['route' => 'tags.store', 'method' => 'post']) !!}
                <h1>New Tag</h1>
                {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                {!! Form::submit('Create New', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) !!}
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
