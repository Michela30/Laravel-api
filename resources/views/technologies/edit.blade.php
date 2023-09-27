@extends('layouts.app')

@section('page-title', 'Edit technology')

@section('main-content')

<div class="container">
    <h2 class="text-center">
        Edit Technology
    </h2>

    <div class="bg-warning px-3 py-3">

        <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" min="2" max="32" placeholder="Write here the title..." value="{{ old('title', $technology->title) }}" required>
            </div>
            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="text-center">
                <button type="submit" class="btn btn-warning border-2 border-white">
                    Edit
                </button>
            </div>
    
        </form>

    </div>
</div>

@endsection