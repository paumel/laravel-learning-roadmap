<?php

namespace App\Http\Controllers;

use App\Models\Roadmap\CompletedProject;
use App\Models\Roadmap\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectToggleController extends Controller
{
    public function __invoke(Request $request, Project $project): RedirectResponse
    {
        $completedProject = CompletedProject::where('project_id', $project->id)->where('user_id', Auth::id())->first();

        if ($completedProject) {
            $completedProject->delete();
        } else {
            CompletedProject::create([
                'user_id' => Auth::id(),
                'project_id' => $project->id,
            ]);
        }

        return back();
    }
}
