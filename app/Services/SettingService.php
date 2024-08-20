<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class SettingService
{
    public function __construct() {}

    public static function getAll(): Collection
    {
        return Cache::remember("settings", config("cache.time"), function () {
            return Setting::get();
        });
    }

    public static function toArray()
    {
        $settings = self::getAll();
        $config = [];
        $settings->each(function ($item) use (&$config) {
            $config[$item->category][$item->key] = $item->value;
        });
        return $config;
    }

    public static function get($key)
    {
        return Cache::remember("setting.{$key}", config("cache.time"), function () use ($key) {
            return self::getAll()->where("key", $key)->first()?->value;
        });
    }

    public function getCacheTime()
    {
        return Cache::remember("setting.cache_time", config("cache.time"), function () {
            return intval(Setting::where('key', 'cache_time')->first()->value ?: 60 * 60);
        });
    }
}
