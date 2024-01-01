<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = [];
    const PENDING = 'Pending';
    const ACTIVE = 'Active';
    const SUSPEND = 'Suspend';

    const STATUS = [self::ACTIVE, self::PENDING, self::SUSPEND];
    public function quizzes(): MorphMany
    {
        return $this->morphMany(Quiz::class, 'creator');
    }

    public function actions(): MorphMany
    {
        return $this->morphMany(Action::class, 'creator');
    }
}
