@extends("layouts.app")

@section("body")
<div class="card" style="width: 18rem;">
    <img height="300" src="{{ asset('storage/' . $post['image']) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $post['title'] }}</h5>
        <p class="card-text">Salary:{{ $post['body'] }}</p>
        <x-button type="primary" href="{{ route('posts.home') }}">Back</x-button>
    </div>
</div>
@endsection
