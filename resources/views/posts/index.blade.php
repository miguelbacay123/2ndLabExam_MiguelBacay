@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2 text-dark">Posts</h1>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($posts->count() > 0)
    <div class="row g-4">
        @foreach ($posts as $post)
            <div class="col-12">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h3 class="card-title h4 text-primary">{{ $post->title }}</h3>
                        <p class="card-text text-muted mb-3">{{ Str::limit($post->body, 150) }}</p>
                        
                        <div class="d-flex flex-wrap gap-2 align-items-center">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-info btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" 
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                            <small class="text-muted ms-auto">
                                <i class="bi bi-clock"></i> {{ $post->created_at->format('M d, Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-5">
        <div class="text-muted mb-3">
            <i class="bi bi-journal-text" style="font-size: 4rem;"></i>
        </div>
        <h3 class="text-muted">No posts yet</h3>
        <p class="text-muted mb-4">Start sharing your thoughts with the world!</p>
        <p class="text-muted small">Use the "Create Post" button above to get started</p>
    </div>
@endif
@endsection