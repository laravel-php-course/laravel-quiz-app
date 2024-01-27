<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Replay extends Model
{
    use HasFactory;
    public function topics(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
    public function creators(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function replaylikes(): HasMany
    {
        return $this->hasMany(ReplayLike::class);
    }
    public function replaydislikes(): HasMany
    {
        return $this->hasMany(Replaydislike::class);
    }
}
