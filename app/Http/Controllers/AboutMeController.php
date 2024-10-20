<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    // Show the form to edit the content
    public function edit()
    {
        $aboutMe = AboutMe::first(); // Get the first entry
        return view('admin.about_me.edit', compact('aboutMe'));
    }

    // Update the content
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Get the first entry or create a new one with default values
        $aboutMe = AboutMe::firstOrCreate(
            [],
            ['title' => $request->input('title'), 'content' => $request->input('content')]
        );

        // Update the existing entry with the new values
        $aboutMe->title = $request->input('title');
        $aboutMe->content = $request->input('content');
        $aboutMe->save();

        return redirect()->route('about_me.edit')->with('success', 'Content updated successfully!');
    }



    // Show the content on the /about-me page
    public function show()
    {
        $aboutMe = AboutMe::first();
        return view('about_me.show', compact('aboutMe'));
    }
}
