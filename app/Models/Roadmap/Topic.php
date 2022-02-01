<?php

namespace App\Models\Roadmap;

use App\Traits\Toggleable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Toggleable;

    protected $fillable = [
        'name',
        'topic_id',
        'level_id',
        'position',
    ];

    protected $appends = [
        'completed',
    ];

    protected $with = [
        'userCompletion',
        'children',
    ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Topic::class)->orderBy('position');
    }

    public function links(): BelongsToMany
    {
        return $this->belongsToMany(Link::class)->orderBy('position');
    }

    public function userCompletion(): HasOne
    {
        return $this->hasOne(CompletedTopic::class)->where('user_id', Auth::id());
    }

    public function getCompletedAttribute(): bool
    {
        $childrenCount = $this->children->count();
        if ($childrenCount > 0) {
            return $childrenCount === $this->children->where('completed', true)->count();
        }

        return $this->userCompletion !== null;
    }
}
