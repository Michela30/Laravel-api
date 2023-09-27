@extends('layouts.app')

@section('page-title', $technology->title)

@section('main-content')

<div class="container">

    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <small>{{ $technology->id }}</small>
            </div>

            <h5 class="card-title text-center pt-4">
                Title: {{ $technology->title }}
            </h5>
        </div>
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary mt-4">All types</a>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <ul>
                @foreach ($technology->projects as $project)
                    <li>
                       <a href="{{ route('admin.projects.show', ['project' => $project->id ]) }}">
                        {{ $project->title }}
                       </a>
                    </li>
                @endforeach
            </ul>
        </div>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-success mt-4">All projects</a>
    </div>
</div>

@endsection