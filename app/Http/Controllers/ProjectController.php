<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Software;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;

class ProjectController extends Controller
{
    public function index()
    {
        // Fetch all projects from the database
        $projects = Project::all();

        // Return the welcome view and pass the projects
        return view('welcome', compact('projects'));
    }

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
