<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects for public view.
     */
    public function index()
{
    $projects = Project::latest()->get();
    $upcomingProjects = \App\Models\UpcomingProject::all(); // Add this line
    return view('projects.index', compact('projects', 'upcomingProjects'));
}

    /**
     * Display a listing of projects for admin panel.
     */
    public function adminIndex()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'github_link' => 'nullable|url',
            'documentation_file' => 'nullable|file|mimes:pdf|max:10240', // Max 10MB
            'project_image' => 'nullable|image|max:2048' // Max 2MB
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'github_link' => $request->github_link
        ];

        // Handle documentation file upload
        if ($request->hasFile('documentation_file')) {
            $data['documentation_path'] = $request->file('documentation_file')
                ->store('project-docs', 'public');
        }

        // Handle project image upload
        if ($request->hasFile('project_image')) {
            $data['image_path'] = $request->file('project_image')
                ->store('project-images', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'github_link' => 'nullable|url',
            'documentation_file' => 'nullable|file|mimes:pdf|max:10240', // Max 10MB
            'project_image' => 'nullable|image|max:2048' // Max 2MB
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'github_link' => $request->github_link
        ];

        // Handle documentation file upload
        if ($request->hasFile('documentation_file')) {
            // Delete old file if exists
            if ($project->documentation_path && Storage::disk('public')->exists($project->documentation_path)) {
                Storage::disk('public')->delete($project->documentation_path);
            }

            $data['documentation_path'] = $request->file('documentation_file')
                ->store('project-docs', 'public');
        }

        // Handle project image upload
        if ($request->hasFile('project_image')) {
            // Delete old image if exists
            if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
                Storage::disk('public')->delete($project->image_path);
            }

            $data['image_path'] = $request->file('project_image')
                ->store('project-images', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        // Delete related files
        if ($project->documentation_path && Storage::disk('public')->exists($project->documentation_path)) {
            Storage::disk('public')->delete($project->documentation_path);
        }

        if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    /**
     * Download project documentation.
     */
    public function downloadDocumentation(Project $project)
{
    if (!$project->documentation_path || !Storage::disk('public')->exists($project->documentation_path)) {
        return back()->with('error', 'Documentation not found.');
    }

    $path = storage_path('app/public/' . $project->documentation_path);
    return response()->download($path, $project->title . '_documentation.pdf', [
        'Content-Type' => 'application/pdf'
    ]);
}
}
