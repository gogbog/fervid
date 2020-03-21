<?php

namespace App\Modules\Projects\Http\Controllers;

use App\Modules\Projects\Models\Project;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::with(['media'])->get();
        return view('projects::front.index', compact('projects'));
    }

    public function view(Project $project) {
        return view('projects::front.view', compact('project'));
    }
}
