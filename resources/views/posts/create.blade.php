@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-lg border-0">
            <div class="card-header warm-gradient-header py-3">
                <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Create New Post</h4>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('posts.store') }}" class="vstack gap-4">
                    @csrf
                    <div>
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" name="title" class="form-control form-control-lg" 
                               value="{{ old('title') }}" placeholder="Enter title" required>
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="form-label fw-semibold">Content</label>
                        <textarea name="body" class="form-control" rows="6" 
                                  placeholder="Write your content here" required>{{ old('body') }}</textarea>
                        @error('body')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-warm px-4 py-2">
                            <i class="bi bi-check-lg"></i> Create Post
                        </button>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary px-4 py-2">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection