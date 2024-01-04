<?php

namespace App\Services;

use Exception;
use Psr\SimpleCache\InvalidArgumentException;

class VerificationService extends BaseService
{
    private static int $min = 1000000;
    private static int $max = 9999999;
    const CACHE_KEY = 'verification_code_';

    /**
     * @throws Exception
     */
    public static function generteCode(): int
    {
        return random_int(self::$min, self::$max);
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function set($key, $value, $time = 5) //TODO ADD TO CONFIG
    {
        if (!cache()->has(self::CACHE_KEY.$key))
        {
            $time = $time == 5 ? now()->addMinutes(1) : now()->addMinutes($time);
            cache()->set(self::CACHE_KEY.$key, $value, $time);
        }
    }
}
