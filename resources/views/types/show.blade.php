@extends('layouts.app')

@section('page-title', $type->title)

@section('main-content')

<div class="container">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center pt-4">
                <small>{{ $type->id }}</small>
                Title: {{ $type->title }}
            </h5>
        </div>
            <a href="{{ route('admin.types.index') }}" class="btn btn-primary mt-4">All types</a>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <ul>
                @foreach ($type->projects as $project)
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