<?php

namespace App\Http\Controllers;

use App\Models\Roadmap\Topic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TopicToggleController extends Controller
{
    public function __invoke(Request $request, Topic $topic): RedirectResponse
    {
        $topic->toggle();

        return back();
    }
}
