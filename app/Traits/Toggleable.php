<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait Toggleable
{
    public function toggle(): void
    {
        $this->userCompletion
            ? $this->userCompletion->delete()
            : $this->userCompletion()->create(['user_id' => Auth::id()]);
    }
}
