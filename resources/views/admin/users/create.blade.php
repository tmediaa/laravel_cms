@extends('admin.index')


@section('content')
    <h1>Create User</h1>
    <header class="page-header"></header>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['method'=>'post' , 'action'=>'AdminUserController@store','files'=>true]) !!}
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
                {!! Form::label('file','Upload Profile Avatar') !!}
                {!! Form::file('file',['class'=>'form-control']) !!}
            </div>


            {!! Form::token() !!}

            <div class="form-group">
                {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}


            @if(count($errors) > 0)

                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach

            @endif
        </div>
    </div>





@endsection