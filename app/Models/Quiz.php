<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Quiz extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function quizActions(): HasMany
    {
        return $this->hasMany(QuizAction::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): MorphTo
    {
        return $this->morphTo();
    }
}
