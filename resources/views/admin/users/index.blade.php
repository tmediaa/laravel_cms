@extends('admin.index')


@section('content')
    <h1>Users</h1>
    <header class="page-header"></header>


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
                    <td><span class="profile_photo"><img src='/images/{{ $user->photo->file }}'" alt=""/></span></td>
                    <td>{{ $user->name }}</td>
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