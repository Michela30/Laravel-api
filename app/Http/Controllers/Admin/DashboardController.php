<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\User;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;


// Helpers
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = User::all();
        $countProjects = Project::count();
        $countTypes = Type::count();
        $countTechnologies = Technology::count();


        return view('dashboard', compact('user','countProjects', 'countTypes', 'countTechnologies'));
    }
}
