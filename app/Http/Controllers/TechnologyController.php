<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;


//models
use App\Models\Technology;
use App\Models\Type;
use App\Models\Project;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $data = $request->all();

        $technology = new Technology();
        $technology->title = $data['title'];
        $technology->save();

        return redirect()->route('admin.technologies.index', compact('technology'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $technology = Technology::findOrFail($id);

        return view ('technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $technology = Technology::findOrFail($id);
        return view ('technologies.edit', compact('technology'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, string $id)
    {
        $data = $request->all();

        $technology = Technology::findOrFail($id);
        $technology->title = $data['title'];
        $technology->save();

        return redirect()->route('admin.technologies.index', compact('technology'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technology = Technology::findOrFail($id);
        $technology -> delete();

        return redirect()->route('admin.technologies.index', compact('technology'));
    }
}
