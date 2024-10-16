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
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'video' => 'nullable|file|mimes:mp4,avi,mov,wmv|max:51200',
            'short_description' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpg,png,jpeg|max:4096',
            'background_primary_color' => 'nullable|string|max:7',
            'article_color' => 'nullable|string|max:7',
            'software' => 'nullable|array',
            'shortline_description' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('projects/images', 'public');
                $images[] = $imagePath;
            }
        }
        $validated['images'] = $images;

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('projects/videos', 'public');
            $validated['video_path'] = $videoPath;
        }

        $validated['software'] = $request->input('software');
        $validated['user_id'] = auth()->id(); // Associate the project with the authenticated user

        $project = Project::create($validated);

        return redirect()->route('dashboard.projects.index')->with('success', 'Project added successfully!');
    }



    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validate multiple images
            'video' => 'nullable|file|mimes:mp4,avi,mov,wmv|max:51200', // Video file validation
            'short_description' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpg,png,jpeg|max:4096',
            'background_primary_color' => 'nullable|string|max:7', // Hex color code
            'article_color' => 'nullable|string|max:7', // Hex color code
            'software' => 'nullable|array',
            'shortline_description' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $images = $project->images ?? [];

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('projects/images', 'public');
                $images[] = $imagePath;
            }
        }

        $validated['images'] = $images;

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
