<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('type','technologies')->paginate(3);
        //$projects = Project::all();

        return response()->json([
            'success' => true,
            'projects' => $projects,
        ]);
    }

    public function show(string $slug){
        
        $project = Project::where('slug',$slug)->with('type','technologies')->first();

        if($project){
            return response()->json([
                'success' => true,
                'project' => $project,
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Richiesta non valida',
            ]);
        }
    }
}
