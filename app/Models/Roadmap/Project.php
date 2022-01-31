<?php

namespace App\Models\Roadmap;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'level_id',
    ];

    protected $appends = [
        'completed'
    ];

    protected $with = [
        'completedByUser'
    ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function completedByUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'completed_projects')->where('user_id', Auth::id());
    }

    public function getCompletedAttribute(): bool
    {
        return $this->completedByUser->count() > 0;
    }
}
