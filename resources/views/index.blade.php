@extends('layouts.app')

@section("content")

<div class="container">
    <h1>All posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['body'] }}</td>
                <td>
                    <a href="{{ route('post.show', $post['id']) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('post.edit', $post['id']) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('post.destroy', $post['id']) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
