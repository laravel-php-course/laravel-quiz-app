<?php

namespace App\Services;

use Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
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
     * @param int|string|null $time
     * @throws InvalidArgumentException
     */
    public static function set($key, $value, $time = null)
    {
        if (!cache()->has(self::CACHE_KEY.$key))
        {
            $time = empty($time) ? now()->addMinutes(env('TIME_FOR_CACHE', '2')) : now()->addMinutes($time);
            cache()->set(self::CACHE_KEY.$key, $value, $time);
        }
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function get(string $key)
    {
        return cache()->has(self::CACHE_KEY.$key) ? cache()->get(self::CACHE_KEY.$key) : false;
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function delete(string $key)
    {
        if (cache()->has(self::CACHE_KEY.$key))
        {
            cache()->delete(self::CACHE_KEY.$key);
        }
    }
}
