@extends('partials.main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <img src="{{ asset('images/' . $post->image) }}" alt="">
            <p class="lead">{!! $post->body !!} </p>
            
            <div class="tags">
                <p>Tags: </p>
                @foreach($post->tags as $tag)
                    <a href="{{ route('tags.show', $tag->id) }}"><span
                            class="badge badge-secondary">{{ $tag->name }}</span></a>
                @endforeach
            </div>
            <div id="backend-comment" style="margin-top: 50px;">
                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

                <table class="table">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="75px"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn-primary"><span><i class="fas fa-pencil-alt fa-xs"></i></span></a>
                                <a href="{{ route('comments.delete', $comment->id) }}" class="btn-danger"><span><i class="fas fa-trash-alt fa-xs"></i></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-body bg-light">

                <dl class="row">
                    <label class="col-sm-4">Url:</label>
                    <a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a>
                </dl>

                <dl class="row">
                    <dt class="col-sm-4">Created At:</dt>
                    <dd class="col-sm-8">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-4">Updated At:</dt>
                    <dd class="col-sm-8">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy' , $post->id] , 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {!! Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-block btn-h1-spacing']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
