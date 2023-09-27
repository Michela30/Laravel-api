<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

//model
use App\Models\Project;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $types= Type::all();

       return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->all();

        $newType = new Type();
        $newType->title = $data['title'];
        $newType->save();

        return redirect()->route('admin.types.index', compact('newType'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type= Type::find($id);

       return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = Type::findOrFail($id);
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, string $id)
    {
        $data = $request->all();

        $newType = Type::findOrFail($id);
        $newType->title = $data['title'];
        $newType->save();

        return redirect()->route('admin.types.index', compact('newType'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);
        $type -> delete();

        return redirect()->route('admin.types.index', compact('type'));
    }
}
