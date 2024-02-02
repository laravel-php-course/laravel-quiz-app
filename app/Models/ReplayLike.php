<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReplayLike extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function topics(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
    public function creators(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function replays(): BelongsTo
    {
        return $this->belongsTo(Replay::class);
    }
}
