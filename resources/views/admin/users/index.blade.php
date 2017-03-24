@extends('admin.index')


@section('content')
    <h1>Users</h1>
    <header class="page-header"></header>


    @if(Session::get('user_deleted'))
        <div class="alert alert-danger" role="alert">{{ Session::get('user_deleted') }}</div>

    @endif

    @if(count($users))
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Create At</th>
        </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ route('users.edit',$user->id) }}"><span class="profile_photo"><img src="{{$user->photo  ? $user->photo->file : 'http://placehold.it/80/80' }}" alt=""/></span></a></td>
                    <td><a href="{{ route('users.edit',$user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else
        <div class="alert alert-danger" role="alert">You Are not Active user</div>

    @endif
@endsection