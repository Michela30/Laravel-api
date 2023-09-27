<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $countProjects = \App\Models\Project::count();

        return view('dashboard');
    }
}
