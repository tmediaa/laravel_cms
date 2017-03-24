@extends('admin.index')


@section('content')
    <smal class="badge">Edit:</smal><h1>{{ $user->name }}</h1>
    <header class="page-header"></header>
    <div class="row">

        <div class="col-md-3">
            <img src="{{$user->photo  ? $user->photo->file : 'http://placehold.it/400/400' }}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-md-9">
            {!! Form::model($user,['method'=>'PATCH' , 'action'=>['AdminUserController@update', $user->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id','User Type') !!}
                {!! Form::select('role_id',  $roles ,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active','User Type') !!}
                {!! Form::select('is_active', ['1' => 'Active', '2' => 'Not Active'] ,null,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('password','Password') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','Upload Profile Avatar') !!}
                {!! Form::file('photo_id',['class'=>'form-control']) !!}
            </div>


            {!! Form::token() !!}

            <div class="form-group">
                {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}


            @if(count($errors) > 0)

                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach

            @endif


            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUserController@destroy', $user->id]]) !!}


            <div class="form-group">
                {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>





@endsection