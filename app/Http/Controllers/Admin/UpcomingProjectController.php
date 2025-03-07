<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UpcomingProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpcomingProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upcomingProjects = UpcomingProject::all();

        return view('admin.upcoming-projects.index', compact('upcomingProjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.upcoming-projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $upcomingProject = new UpcomingProject();
        $upcomingProject->title = $validated['title'];
        $upcomingProject->description = $validated['description'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('upcoming_projects', 'public');
            $upcomingProject->image_path = $path;
        }

        $upcomingProject->save();

        return redirect()->route('admin.upcoming-projects.index')
            ->with('success', 'Upcoming project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpcomingProject $upcomingProject)
    {
        return view('admin.upcoming-projects.edit', compact('upcomingProject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpcomingProject $upcomingProject)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $upcomingProject->title = $validated['title'];
        $upcomingProject->description = $validated['description'];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($upcomingProject->image_path) {
                Storage::disk('public')->delete($upcomingProject->image_path);
            }

            $path = $request->file('image')->store('upcoming_projects', 'public');
            $upcomingProject->image_path = $path;
        }

        $upcomingProject->save();

        return redirect()->route('admin.upcoming-projects.index')
            ->with('success', 'Upcoming project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpcomingProject $upcomingProject)
    {
        // Delete image if exists
        if ($upcomingProject->image_path) {
            Storage::disk('public')->delete($upcomingProject->image_path);
        }

        $upcomingProject->delete();

        return redirect()->route('admin.upcoming-projects.index')
            ->with('success', 'Upcoming project deleted successfully.');
    }
}
