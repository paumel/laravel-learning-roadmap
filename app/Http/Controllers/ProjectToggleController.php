<?php

namespace App\Http\Controllers;

use App\Models\Roadmap\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectToggleController extends Controller
{
    public function __invoke(Request $request, Project $project): RedirectResponse
    {
        $project->toggle();

        return back();
    }
}
