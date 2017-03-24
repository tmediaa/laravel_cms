@extends('admin.index')


@section('content')
    <h1>All Posts</h1>
    <header class="page-header"></header>



    @if(count($posts))
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Create At</th>
            </tr>
            </thead>
            <tbody>

            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td><a href="{{ route('users.edit',$post->id) }}"><span class="profile_photo"><img src="{{$post->photo  ? $post->photo->file : 'http://placehold.it/80/80' }}" alt=""/></span></a></td>
                    <td>{{ $post->title}}</td>
                    <td>{{ $post->body}}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <div class="alert alert-danger" role="alert">You Are not Post</div>

    @endif
@endsection