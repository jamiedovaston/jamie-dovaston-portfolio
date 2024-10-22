<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Software;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    // Display the projects on the main page
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function edit(Project $project)
    {
        $allSoftware = Software::all();
        $project->load('software');

        return view('admin.projects.edit', compact('project', 'allSoftware'));
    }



    // Show form to create a new project
    public function create()
    {
        $allSoftware = Software::all(); // Fetch all software entries from the database
        return view('admin.projects.create', compact('allSoftware')); // Pass it to the view
    }

    // Store a new project in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|url',
            'video_path' => 'nullable|url',
            'short_description' => 'required|string',
            'background_image' => 'nullable|url', // Validate as a URL
            'background_primary_color' => 'nullable|string',
            'article_color' => 'nullable|string',
            'software' => 'nullable|array',
            'software.*' => 'nullable|array',
            'shortline_description' => 'required|string',
            'body' => 'required|string',
        ]);

        $project = Project::create($validated);

        if ($request->has('software')) {
            $project->software()->sync($request->input('software'));
        }

        $validated['user_id'] = auth()->id();

        $project = Project::create($validated);

        return redirect()->route('dashboard.projects.index')->with('success', 'Project added successfully!');
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'nullable|url',
            'video_path' => 'nullable|url',
            'short_description' => 'required|string',
            'background_image' => 'nullable|url', // Validate as a URL
            'background_primary_color' => 'nullable|string|max:7',
            'article_color' => 'nullable|string|max:7',
            'software' => 'nullable|array',
            'software.*' => 'exists:software,id',
            'shortline_description' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $project->update($validated);

        $project->software()->sync($request->input('software', []));

        $project->update($validated);

        return redirect()->route('dashboard.projects.index')->with('success', 'Project updated successfully!');
    }


    public function destroy(Project $project)
    {
        // Delete the project
        $project->delete();

        // Redirect to the projects index page with a success message
        return redirect()->route('dashboard.projects.index')->with('success', 'Project deleted successfully!');
    }

    public function show(Project $project)
    {
        // Load the software relationship
        $project->load('software');
        return view('projects.show', compact('project'));
    }


}
