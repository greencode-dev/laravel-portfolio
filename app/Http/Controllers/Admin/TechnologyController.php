<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::withCount('projects')->orderBy('name')->get();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:technologies,name'],
        ]);

        $data['slug'] = Str::slug($data['name']);

        Technology::create($data);

        return redirect()->route('admin.technologies.index')->with('success', __('Technology created successfully.'));
    }

    public function show(Technology $technology)
    {
        $technology->load('projects');
        return view('admin.technologies.show', compact('technology'));
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:technologies,name,' . $technology->id],
        ]);

        $data['slug'] = Str::slug($data['name']);

        $technology->update($data);

        return redirect()->route('admin.technologies.index')->with('success', __('Technology updated successfully.'));
    }

    public function destroy(Technology $technology)
    {
        $technology->projects()->detach();
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('success', __('Technology deleted successfully.'));
    }
}
