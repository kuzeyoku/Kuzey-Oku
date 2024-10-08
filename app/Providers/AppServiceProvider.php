<?php

namespace App\Providers;

use App\Services\SettingService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
        config()->set(\App\Services\SettingService::toArray());
        Blade::directive('setting', function ($expression) {
            return "<?php echo \App\Services\SettingService::get({$expression}) ?: null; ?>";
        });
    }
}
