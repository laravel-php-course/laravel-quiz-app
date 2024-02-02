<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
    public function dislikes(): HasMany
    {
        return $this->hasMany(disLike::class);
    }
    public function replays(): HasMany
    {
        return $this->hasMany(Replay::class);
    }
}
