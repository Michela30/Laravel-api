@extends('layouts.app')

@section('page-title', 'Technologies')

@section('main-content')

    
    <div class="container">

        <h2 class="text-center">
            All Technologies
        </h2>

        <div class="text-center my-4">

            <a href="{{ route('admin.technologies.create') }}">
                <button class="btn btn-success">
                    Add new Technology
                </button>
            </a>

        </div>

        <div class="mw-100">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Projects</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($technologies as $technology)
                        
                        <tr>
                            <th scope="row">
                                {{ $technology->id }}
                            </th>
                            <td>
                                {{ $technology->title }}
                            </td>
                            <td>
                                <ul>
                                    @foreach($technology->projects as $project)
                                    <li>
                                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                            {{ $project->title ?? '-' }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            
                            <td>
                                <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}">
                                    <button class="btn btn-primary">
                                        View
                                    </button>
                                </a>
                                <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}">
                                    <button class="btn btn-warning">
                                        Edit
                                    </button>
                                </a>
                                <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="post" onsubmit="return confirm ('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>

@endsection

