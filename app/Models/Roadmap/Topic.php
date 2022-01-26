<?php

namespace App\Models\Roadmap;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->hasMany(Topic::class);
    }

    public function links(): BelongsToMany
    {
        return $this->belongsToMany(Link::class);
    }
}
