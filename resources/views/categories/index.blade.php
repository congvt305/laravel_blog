@extends('partials.main')

@section('title', '| Categories')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <th>{{ $category->name }}</th>
                        <th>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card col-md-3">
            <div class="card-body">
                {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
                    <h1>New Category</h1>
                	{!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! Form::submit('Create New', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) !!}
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
