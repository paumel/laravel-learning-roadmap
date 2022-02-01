<?php

namespace App\Models\Roadmap;

use App\Traits\Toggleable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Toggleable;

    protected $fillable = [
        'name',
        'description',
        'level_id',
    ];

    protected $appends = [
        'completed',
    ];

    protected $with = [
        'userCompletion',
    ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function userCompletion(): HasOne
    {
        return $this->hasOne(CompletedProject::class)->where('user_id', Auth::id());
    }

    public function getCompletedAttribute(): bool
    {
        return $this->userCompletion !== null;
    }
}
