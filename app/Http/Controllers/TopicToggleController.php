<?php

namespace App\Http\Controllers;

use App\Models\Roadmap\CompletedTopic;
use App\Models\Roadmap\Topic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicToggleController extends Controller
{
    public function __invoke(Request $request, Topic $topic): RedirectResponse
    {
        $completedTopic = CompletedTopic::where('topic_id', $topic->id)->where('user_id', Auth::id())->first();

        if ($completedTopic) {
            $completedTopic->delete();
        } else {
            CompletedTopic::create([
                'user_id' => Auth::id(),
                'topic_id' => $topic->id,
            ]);
        }

        return back();
    }
}
