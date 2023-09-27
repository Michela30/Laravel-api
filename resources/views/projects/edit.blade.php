@extends('layouts.app')

@section('page-title', 'Edit Project')

@section('main-content')

<div class="container">
    <h2 class="text-center">
        Edit Project
    </h2>

    <div class="bg-warning px-3 py-3">

        <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" min="2" max="170" placeholder="Write here the title..." value="{{ old('title', $project->title) }}" required>
            </div>
            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-3">
                <label for="creation_date" class="form-label">Creation date</label>
                <input type="date" class="form-control" id="creation_date" name="creation_date" placeholder="Write here the creation date..." value="{{ old('creation_date', $project->creation_date) }}">
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">Url <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="Write here the url..." min="40" max="2054" value="{{ old('url', $project->url) }}" required>
            </div>
            @error('url')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

           {{-- thumb --}}
           <label for="thumb" class="form-label d-block">Thumb</label>
           <div class="input-group mb-3">
               <input type="file" class="form-control d-block" name="thumb" id="thumb" placeholder="Choose here the thumb..." accept="image/*">
           </div>

            @if ($project->thumb)
                <div>
                    <img src="{{ asset('storage/' . $project->thumb) }}" class="w-50" alt="">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="remove_thumb" id="remove_thumb">
                    <label class="form-check-label" for="remove_thumb">
                        Remove
                    </label>
                </div>
            @endif

            <div class="mb-3">
                <label for="is_online" class="form-label">Is online <span class="text-danger">*</span></label>
                <input type="number" min="0" max="1" class="form-control @error('is_online') is-invalid @enderror" id="is_online" name="is_online" placeholder="Write here if this is online..." value="{{ old('is_online', $project->is_online) }}" required>
            </div>
            @error('is_online')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="type_id" class="form-label">Type</label>
            <select class="form-select" name="type_id">
                <option value="">Select a type...</option>

                @foreach ($types as $type)  
                    <option value="{{ $type->id }}"
                        @if(old('type_id', $project->type_id) == $type->id)
                        selected 
                        @endif
                        >
                        
                        {{ $type->title }}
                    </option>
                @endforeach
            </select>

            <div class="my-3">
                <label class="form-label d-block">Technologies</label>
                @foreach ($technologies as $tec)
                    <input class="form-check-input" type="checkbox" id="{{ $tec->id }}" name="technologies[]" value="{{ $tec->id }}" 
                    @if( $errors->any())

                        @if(in_array(
                            $tec->id, old('technologies', [])
                            )
                        ) 
                        checked 
                        @endif

                    @elseif( $project->technologies->contains($tec->id))
                        checked 
                    @endif> <!-- chiusura tag checkbox -->

                    <label class="form-check-label" for="{{ $tec->id }}">
                        {{ $tec->title }}
                    </label>
                @endforeach
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"  name="description" rows="3" placeholder="Write here the description..." required>{{ old('description', $project->description) }} </textarea>
            </div>
            @error('description')
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