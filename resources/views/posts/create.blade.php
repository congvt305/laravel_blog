@extends('partials.main')

@section('title', '| Create New Post')

@section('stylesheets')

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" >
    <script src="https://cdn.tiny.cloud/1/os2uhbzt74zw845ntaxgqjtdqy8gobj9a8esilemunvn4bma/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link code',
        });
    </script>

@endsection
@section('content')

    <div class="row">
        <div class="col-md-8 con-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}

            {{ Form::label('title', 'Title:')}}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => ''))}}

            {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
            {!! Form::text('slug', '', ['class' => 'form-control']) !!}

            {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            {{ Form::label('tags', 'Tags:') }}
            <select class="form-control select2" multiple="multiple" name="tags[]">
                @foreach($tags as $tag)
                    <option value='{{ $tag->id }}'>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>

            {!! Form::label('featured_image', 'Upload Featured Image') !!}
            {!! Form::file('featured_image') !!}
            <br>
            {{ Form::label('body', 'Post Body:', ['class' => 'control-label']) }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}

            {{ Form::submit('Create Post', array('class' => 'btn btn-success', 'style' => 'margin-top: 20px; margin-bottom: 20px;') )}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript" src="{{ URL::asset('js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

@endsection
