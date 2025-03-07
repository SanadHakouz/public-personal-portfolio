<?php

namespace App\Http\Controllers;

use App\Models\UpcomingProject;
use Illuminate\Http\Request;

class UpcomingProjectController extends Controller
{
    /**
     * Display the specified upcoming project.
     */
    public function show(UpcomingProject $upcomingProject)
    {
        return view('upcoming-projects.show', compact('upcomingProject'));
    }
}
