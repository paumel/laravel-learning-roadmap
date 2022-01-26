<?php

namespace App\Http\Controllers;

use App\Models\Roadmap\Level;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoadmapController extends Controller
{
    public function __invoke(Request $request): \Inertia\Response
    {
        $levels = Level::orderBy('position')->get();
        $levels->load([
            'projects',
            'parentTopics.links.type',
            'parentTopics.children.links.type'
        ]);

        return Inertia::render('Dashboard', compact('levels'));
    }
}
