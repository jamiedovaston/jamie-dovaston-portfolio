<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
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

    // Show form to create a new project
    public function create()
    {
        return view('admin.projects.create');
    }

    // Store a new project in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg',
            'video' => 'nullable|file|mimes:mp4,avi,mov,wmv',
            'short_description' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpg,png,jpeg',
            'background_primary_color' => 'nullable|string',
            'article_color' => 'nullable|string',
            'software' => 'nullable|array',
            'shortline_description' => 'required|string',
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
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:20480000', // Validate multiple images
            'video' => 'nullable|file|mimes:mp4,avi,mov,wmv|max:512000000', // Video file validation
            'short_description' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpg,png,jpeg|max:40960000',
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

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
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
        return view('projects.show', compact('project'));
    }

}
