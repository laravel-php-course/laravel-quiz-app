<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Answer extends Model
{
    use HasFactory;

    public function actions(): MorphMany
    {
        return $this->morphMany(Action::class, 'target');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
