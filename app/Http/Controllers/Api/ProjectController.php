<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function welcome() {
        $projects = Project::all();

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $projects,
            'message' => 'Welcome to the Projects API',
        ]);
    }

    public function show(Project $project) {

        $project->load('types', 'technologies');

        dd($project);

        // return response()->json([
        //     'success' => true,
        //     'status' => 200,
        //     'data' => $project,
        // ]);
    }
}
