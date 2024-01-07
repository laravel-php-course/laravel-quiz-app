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
     * @param $key
     * @param $value
     * @param mixed $time
     * @throws InvalidArgumentException
     */
    public static function set($key, $value, $time )
    {
        if (!cache()->has(self::CACHE_KEY.$key))
        {
            $time = $time == env('TIME_FOR_CACHE', '2') ? now()->addMinutes(1) : now()->addMinutes($time);
            cache()->set(self::CACHE_KEY.$key, $value, $time);
        }
    }
    public static function get($name)
    {
        $key = session()->get($name);
        if (cache()->has(self::CACHE_KEY.$key))
        {
           return cache()->get(self::CACHE_KEY.$key);
        }
    }
}
