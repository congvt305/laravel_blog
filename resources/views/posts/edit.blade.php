@extends('partials.main')

@section('title', '| Edit Post')

@section('stylesheets')

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <div>
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-8">

                {{Form::label('title', 'Title:')}}
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {!! Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) !!}
                {!! Form::text('slug', null, ['class' => 'form-control']) !!}

                {!! Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control'])  !!}

                {!! Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) !!}
                {!! Form::select('tags[]', $tags , null , ['class' => 'select2 form-control', 'multiple' => 'multiple']) !!}

                {{Form::label('body', 'Body:', ['class' => 'form-spacing-top'])}}
                {{ Form::textarea('body', null , ['class' => 'form-control']) }}

            </div>
            <div class="col-md-4">
                <div class="card card-body bg-light">
                    <dl class="row">
                        <dt class="col-sm-4">Created At:</dt>
                        <dd class="col-sm-8">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                    </dl>

                    <dl class="row">
                        <dt class="col-sm-4">Updated At:</dt>
                        <dd class="col-sm-8">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>

                    <div class="row ">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-primary')) !!}
                        </div>
                        <div class="col-sm-6">
                            {{Form::submit('Save', ['class' => 'btn btn-success'])}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

@stop


@section('scripts')

    <script type="text/javascript" src="{{ URL::asset('js/select2.min.js') }}"></script>

    <script type="text/javascript">
        // $(document).ready(function () {
        //     $('.select2').select2();
            $('.select2').select2().val({!! json_encode($post->tags()->pluck('tag_id')) !!}).trigger('change');
        // });
    </script>
@endsection
