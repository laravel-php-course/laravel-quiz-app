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
    const PENDING = 'Pending';
    const ACTIVE = 'Active';
    const SUSPEND = 'Suspend';

    const STATUS = [self::ACTIVE, self::PENDING, self::SUSPEND];
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class ,'creator_id' , 'id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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

    public static function getPersianStatus($status)
    {
        if ($status === self::ACTIVE)
            return 'تایید شده';
        elseif ($status === self::SUSPEND)
            return 'رد شده';
        elseif ($status === self::PENDING)
            return 'در انتظار تایید';
    }

    public static function getStatusIcon($status)
    {
        if ($status === self::ACTIVE)
            return 'bg-green-500';
        elseif ($status === self::SUSPEND)
            return 'bg-red-500';
        elseif ($status === self::PENDING)
            return 'bg-yellow-500';
    }
}
