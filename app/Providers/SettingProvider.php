<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Nothing to do here.
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $settingsConfig = Cache::remember('setting', config("setting.caching.time", 3600), function () {
            $settings = Schema::hasTable('settings') ? Setting::all() : collect([]);
            $config = [];
            $settings->each(function ($setting) use (&$config) {
                $config["setting.{$setting->category}.{$setting->key}"] = $setting->value;
            });
            return $config;
        });
        config($settingsConfig);
        config([
            "mail.mailers.smtp.host" => config("setting.smtp.host"),
            "mail.mailers.smtp.port" => config("setting.smtp.port"),
            "mail.mailers.smtp.encryption" => config("setting.smtp.encryption"),
            "mail.mailers.smtp.username" => config("setting.smtp.username"),
            "mail.mailers.smtp.password" => config("setting.smtp.password"),
            "mail.from.address" => config("setting.smtp.username"),
            "mail.from.name" => config("setting.general.title"),
            "mail.reply_to.address" => config("setting.smtp.reply_address"),
        ]);
    }
}
