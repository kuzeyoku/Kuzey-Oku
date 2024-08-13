<?php

namespace App\Services;

use App\Models\ThemeAsset;
use Illuminate\Support\Facades\Cache;
use App\Services\Admin\SettingService;

class ThemeService
{
    public static function getThemeAssets()
    {
        return Cache::rememberForever('theme_assets', function () {
            $assetData = ThemeAsset::all();
            $response = SettingService::getThemeAssets();
            foreach ($assetData as $asset) {
                $response->{$asset->name} = $asset->getFirstMediaUrl($asset->name);
            }
            return $response;
        });
    }
}
