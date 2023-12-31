<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Action extends Model
{
    use HasFactory;
    const CREATE = 'Create';
    const UPDATE = 'Update';
    const DELETE = 'Delete';

    const Types = [self::DELETE, self::CREATE, self::UPDATE];

    public function creator(): MorphTo
    {
        return $this->morphTo();
    }

    public function target(): MorphTo
    {
        return $this->morphTo();
    }
}
