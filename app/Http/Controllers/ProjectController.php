<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    // Display the projects on the main page
    public function index()
    {
        $projects = Project::all();
        return view('welcome', compact('projects')); // Change to the 'welcome' view for the homepage
    }

    // Show form to create a new project
    public function create()
    {
        return view('projects.create');
    }

    // Store a new project in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'logos.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validate multiple images
            'short_description' => 'required|string|max:500',
            'body' => 'required|string',
            'finished_at' => 'nullable|date',
            'unity_game' => 'nullable|file|mimes:zip|max:20480',
            'video' => 'nullable|file|mimes:mp4,avi,mov,wmv|max:51200', // Validate video file
        ]);

        $logos = [];

        // Handle multiple logo uploads
        if ($request->hasFile('logos')) {
            foreach ($request->file('logos') as $logo) {
                $logoPath = $logo->store('projects/logos', 'public');
                $logos[] = $logoPath;
            }
        }
        $validated['logos'] = $logos;

        // Handle video upload
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('projects/videos', 'public');
            $validated['video_path'] = $videoPath;
        }

        // Store project with authenticated user's ID
        $validated['user_id'] = auth()->id();
        $project = Project::create($validated);

        return redirect()->route('dashboard.projects.index')->with('success', 'Project added successfully!');
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'logos.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validate multiple images
            'short_description' => 'required|string|max:500',
            'body' => 'required|string',
            'finished_at' => 'nullable|date',
            'unity_game' => 'nullable|file|mimes:zip|max:20480',
            'video' => 'nullable|file|mimes:mp4,avi,mov,wmv|max:51200', // Validate video file
        ]);

        $logos = $project->logos ?? [];

        // Handle multiple logo uploads
        if ($request->hasFile('logos')) {
            foreach ($request->file('logos') as $logo) {
                $logoPath = $logo->store('projects/logos', 'public');
                $logos[] = $logoPath;
            }
        }
        $validated['logos'] = $logos;

        // Handle video upload
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('projects/videos', 'public');
            $validated['video_path'] = $videoPath;
        }

        // Update the project
        $project->update($validated);

        return redirect()->route('dashboard.projects.index')->with('success', 'Project updated successfully!');
    }


    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

}
