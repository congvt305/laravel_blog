@extends('partials.main')

@section('title',  '| '. $tag->name.  'Tag')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} Tag has <small> {{ $tag->posts()->count() }} posts</small></h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block">Edit</a>
        </div>
        <div class="col-md-2">

            {{ Form::open([ 'method' => 'DELETE', 'route' => ['tags.destroy', $tag->id ],
            'onsubmit' => 'return confirm("Are you sure do delete this tag?")']) }}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Post Title</th>
                    <th>Category</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($tag->posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <th><a href="{{ route('posts.show', $post->id) }}">{{$post->title}}</a></th>
                        <th>{{$post->category->name}}</th>
                        <th><a class="btn-outline-secondary btn-outline-dark"
                               href="{{ route( 'posts.show', $post->id) }}">View</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div style="margin-top: 50px">
        <h3><a href="{{ route('tags.index') }}">Back</a></h3>
    </div>

@endsection
