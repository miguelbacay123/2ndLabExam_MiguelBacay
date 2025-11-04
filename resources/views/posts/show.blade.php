@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-info text-white py-3">
                <h2 class="mb-0">{{ $post->title }}</h2>
            </div>
            <div class="card-body p-4">
                <div class="mb-4">
                    <p class="card-text fs-5">{{ $post->body }}</p>
                </div>
                
                <div class="d-flex gap-2 pt-3 border-top">
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Delete this post?')">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection