<?php

namespace App\Services;

class SettingService
{
    public function __construct() {}

    public function getAll()
    {
        return Cache::remember("settings", 60 * 60 * 24, function () {
            return Setting::all()->pluck("value", "key");
        });
    }
}
