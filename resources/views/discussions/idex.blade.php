@extends('layouts.app')

@section('content')
<h1>Discussions</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('discussions.create') }}" class="btn btn-primary mb-3">Create Discussion</a>

<ul class="list-group">
    @foreach ($discussions as $discussion)
        <li class="list-group-item">
            <h3>{{ $discussion->title }}</h3>
            <p>{{ Str::limit($discussion->content, 200) }}</p>
            <a href="{{ route('discussions.show', $discussion->id) }}" class="btn btn-primary">View Discussion</a>
        </li>
    @endforeach
</ul>

{{ $discussions->links() }}
@endsection