<?php



namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    public function index()
    {
        $software = Software::all();
        return view('dashboard.software.index', compact('software'));
    }

    public function create()
    {
        return view('dashboard.software.create');
    }

    public function edit(Software $software)
    {
        return view('dashboard.software.edit', compact('software'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:software,name',
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'image_url' => 'nullable|url', // Validate the image URL
        ]);

        Software::create($validated);

        return redirect()->route('dashboard.software.index')->with('success', 'Software added successfully.');
    }

    public function update(Request $request, Software $software)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:software,name,' . $software->id,
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'image_url' => 'nullable|url', // Validate the image URL
        ]);

        $software->update($validated);

        return redirect()->route('dashboard.software.index')->with('success', 'Software updated successfully.');
    }


    public function destroy(Software $software)
    {
        $software->delete();

        return redirect()->route('dashboard.software.index')->with('success', 'Software deleted successfully.');
    }
}
