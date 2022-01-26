<?php

namespace App\Http\Controllers;

use App\Models\Roadmap\Level;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoadmapController extends Controller
{
    public function __invoke(Request $request): \Inertia\Response
    {
        $levels = Level::with([
            'projects',
            'parentTopics.links.type',
            'parentTopics.children.links.type',
        ])->orderBy('position')->get();

        return Inertia::render('Roadmap', compact('levels'));
    }
}
