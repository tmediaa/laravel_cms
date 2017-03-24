@extends('admin.index')


@section('content')
    <h1>Create Post</h1>
    <header class="page-header"></header>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['method'=>'post' , 'action'=>'PostController@store','files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title','Post Title') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id','Select Post Category') !!}
                {!! Form::select('category_id',  $categories ,null,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('photo_id','Upload Post Photo:') !!}
                {!! Form::file('photo_id',['class'=>'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('body','Post Content:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control', 'rows'=>3]) !!}
            </div>


            {!! Form::token() !!}

            <div class="form-group">
                {!! Form::submit('Add Post',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>





@endsection