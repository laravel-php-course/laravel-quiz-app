<?php

namespace App\Models;

use App\Services\BaseService;
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

    public static function getCreator($count = 5)
    {
        $creator_type = BaseService::getCreatorType();
         return self::where([
            'creator_type' => $creator_type[0],
            'creator_id' => auth()->guard($creator_type[1])->id()
        ])->paginate($count);
    }
}
