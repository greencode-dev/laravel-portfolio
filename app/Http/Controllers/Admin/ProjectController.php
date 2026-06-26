<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->integer('perPage', 10);
        $projects = Project::orderBy('created_at', 'desc')->paginate($perPage)->withQueryString();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::orderBy('name')->get();
        $technologies = Technology::orderBy('name')->get();
        $technologyIds = [];
        return view('admin.projects.create', compact('types', 'technologies', 'technologyIds'));
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $project = Project::create($data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.projects.show', $project->id)->with('success', __('Project created successfully.'));
    }

    public function show(Project $project)
    {
        $project->load('type', 'technologies');
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::orderBy('name')->get();
        $technologies = Technology::orderBy('name')->get();
        $technologyIds = $project->technologies->pluck('id')->toArray();
        return view('admin.projects.edit', compact('project', 'types', 'technologies', 'technologyIds'));
    }

    public function update(StoreProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->update($data);

        $project->technologies()->sync($request->technologies ?? []);

        return redirect()->route('admin.projects.show', $project->id)->with('success', __('Project updated successfully.'));
    }

    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', __('Project deleted successfully.'));
    }
}
