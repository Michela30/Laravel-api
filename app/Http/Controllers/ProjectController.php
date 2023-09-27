<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

//helpers
use Illuminate\Support\Facades\Storage;

//model
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //aggiungo type per poterlo trovare in pagina
        $types = Type::all();
        $technologies = Technology::all();

        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $thumbPath = null;
        if(isset($data['thumb'])) {
            $thumbPath = Storage::put('uploads', $data['thumb']);
        }

        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->creation_date = $data['creation_date'];
        $newProject->url = $data['url'];
        $newProject->thumb =  $thumbPath;
        $newProject->description = $data['description'];
        $newProject->type_id = $data['type_id'];
        $newProject->is_online = $data['is_online'];
        $newProject->save();

        if(isset($data['technologies'])){
            foreach($data['technologies'] as $tecId){
                $newProject->technologies()->attach($tecId);
            }
        }

        return redirect()->route('admin.projects.index', compact('newProject'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        $types = Type::all();
        $technologies = Technology::all();

        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, $project)
    {
        $data = $request->all();
        $editProject = Project::findOrFail($project);

        if($request->file('thumb')!=null) {

            if ($editProject->thumb) {
                Storage::delete($editProject->thumb);
            }

            $thumbPath = Storage::put('uploads', $data['thumb']);
            $editProject->thumb = $thumbPath;
        }
        else if(isset($data['remove_thumb'])){

            if ($editProject->thumb) {
                Storage::delete($editProject->thumb);
            }
            $thumbPath = null;
            $editProject->thumb = $thumbPath;
        }

        
        $editProject->title = $data['title'];
        $editProject->creation_date = $data['creation_date'];
        $editProject->url = $data['url'];
        $editProject->description = $data['description'];
        $editProject->type_id = $data['type_id'];
        $editProject->is_online = $data['is_online'];
        $editProject->save();

        if (isset($data['technologies'])) {
            $editProject->technologies()->sync($data['technologies']);
        }
        else {
            $editProject->technologies()->detach();
        }


        return redirect()->route('admin.projects.index', compact('editProject'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
