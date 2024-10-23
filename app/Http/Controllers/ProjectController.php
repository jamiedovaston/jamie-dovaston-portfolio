<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;

class ProjectController extends Controller
{
    public function index()
    {
        // Fetch all projects from the database
        $projects = Project::all();

        // Return the projects view and pass the projects data
        return view('projects.projects', compact('projects'));
    }

    public function welcome()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }

    /**
     * Show the details of a specific project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        $background_image = $project->background_image;
        $converter = new CommonMarkConverter();
        $project->body = $converter->convert($project->body);

        // Retrieve the software details based on the IDs stored in the project
        $softwareIds = $project->software; // Assuming this is an array of software IDs
        $software = \App\Models\Software::whereIn('id', $softwareIds)->get();

        // Pass the retrieved data to the view
        return view('projects.show', compact('project', 'background_image', 'software'));
    }
}
