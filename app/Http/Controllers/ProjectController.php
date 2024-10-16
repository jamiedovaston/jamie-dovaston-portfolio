<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects on the welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all projects from the database
        $projects = Project::all();

        // Return the welcome view and pass the projects
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
        $converter = new CommonMarkConverter();
        $project->body = $converter->convert($project->body);

        // Return the project details view
        return view('projects.show', compact('project'));
    }
}
