<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $data = $request->validated();

        dd($data);

        $project = new Project();

        $project->fill($data);

        $project->slug = Str::of($data['title'])->slug('-');

        if (isset($data['post_image'])) {
            $project->post_image = Storage::put('uploads', $data['post_image']);
        }
        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        };

        $project->save();



        return redirect()->route('admin.projects.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('edit', compact('project', 'technologies', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $data = $request->validated();
        $project->slug = Str::of($data['title'])->slug('-');
        if (isset($data['post_image'])) {
            $project->post_image = Storage::put('storage', $data['post_image']);
        }

        $project->update($data);
        //$project->slug = Str::of($data['title'])->slug('-');

        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->sync([]);
        }
        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->sync([]);


        if ($project->post_image) {
            Storage::delete($project->post_image);
        }


        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
