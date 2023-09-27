@extends('layouts.app')

@section('page-title', 'Types')

@section('main-content')

    
    <div class="container">

        <h2 class="text-center">
            All Types
        </h2>

        <div class="text-center my-4">

            <a href="{{ route('admin.types.create') }}">
                <button class="btn btn-success">
                    Add new Type
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
                    @foreach ($types as $type)
                        
                        <tr>
                            <th scope="row">
                                {{ $type->id }}
                            </th>
                            <td>
                                {{ $type->title }}
                            </td>
                            <td>
                                <ul>
                                    @foreach($type->projects as $project)
                                    <li>
                                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                            {{ $project->title ?? '-' }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            
                            <td>
                                <a href="{{ route('admin.types.show', ['type' => $type->id]) }}">
                                    <button class="btn btn-primary">
                                        View
                                    </button>
                                </a>
                                <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}">
                                    <button class="btn btn-warning">
                                        Edit
                                    </button>
                                </a>
                                <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="post" onsubmit="return confirm ('Are you sure?')">
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

