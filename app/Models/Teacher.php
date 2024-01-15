<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
//    protected $appends = ['status_info'];/
//    protected $visible = ['*'
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
