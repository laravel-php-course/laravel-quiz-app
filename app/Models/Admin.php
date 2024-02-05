<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    const ADMIN = 'Admin';
    const SUPERADMIN = 'SuperAdmin';

    protected $guarded = [];
    public function quizzes(): MorphMany
    {
        return $this->morphMany(Quiz::class, 'creator');
    }

    public function actions(): MorphMany
    {
        return $this->morphMany(Action::class, 'creator');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
