@extends("layouts.app")

@section("content")
    <h1>Delete Post</h1>
    <form action="{{ route('post.destroy', $post['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete this post?</p>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
