@extends('partials.main')

@section('title', '| Blog')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Blog</h1>
        </div>
    </div>
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>{{ $post->title }}</h2>
                <img src="{{ asset('images/' . $post->image) }}" height="400" alt="">
                <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

                <p>{{ substr(strip_tags($post->body), 0, 250) }} {{ strlen(strip_tags($post->body)) > 250 ? "...": "" }}</p>
                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-secondary">Read more</a>
            </div>
        </div>
    @endforeach

    <div>
        <div>
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
