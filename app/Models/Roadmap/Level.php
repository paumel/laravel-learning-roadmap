<?php

namespace App\Models\Roadmap;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'description',
    ];


    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class)->orderBy('position');
    }

    public function parentTopics(): HasMany
    {
        return $this->hasMany(Topic::class)->whereNull('topic_id')->orderBy('position');
    }
}
