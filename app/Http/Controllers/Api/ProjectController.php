<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        request()->validate([
            'key' => ['nullable', 'string', 'min:3',]
        ]);

        if (request()->key) {
            $projects = Project::where('title', 'LIKE', '%', request()->key, '%')
                ->orWhere('content', 'LIKE', '%', request()->key, '%')
                ->paginate(3);
        } else {
            $projects = Project::paginate(3);
        };



        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
    public function show(string $slug)
    {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        return response()->json($project);
    }
}
