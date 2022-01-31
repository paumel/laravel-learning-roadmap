<?php

namespace App\Models\Roadmap;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        'completedByUser',
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

    public function completedByUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'completed_topics')->where('user_id', Auth::id());
    }

    public function getCompletedAttribute(): bool
    {
        $childrenCount = $this->children->count();
        if ($childrenCount > 0) {
            return $childrenCount === $this->children->where('completed', true)->count();
        }
        return $this->completedByUser->count() > 0;
    }

    public function toggle(): void
    {
        $completedTopic = CompletedTopic::where('topic_id', $this->id)->where('user_id', Auth::id())->first();

        if ($completedTopic) {
            $completedTopic->delete();
        } else {
            CompletedTopic::create([
                'user_id' => Auth::id(),
                'topic_id' => $this->id,
            ]);
        }
    }
}
