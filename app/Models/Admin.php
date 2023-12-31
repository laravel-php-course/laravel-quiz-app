<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Admin extends Model
{
    use HasFactory;

    public function quizzes(): MorphMany
    {
        return $this->morphMany(Quiz::class, 'creator');
    }

    public function actions(): MorphMany
    {
        return $this->morphMany(Action::class, 'creator');
    }
}
