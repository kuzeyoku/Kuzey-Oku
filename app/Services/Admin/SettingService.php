<?php

namespace App\Services\Admin;

use App\Models\Setting;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingService
{
    public function route(): string
    {
        return "setting";
    }

    public function folder(): string
    {
        return "setting";
    }

    public function update(Request $request)
    {
        if ($request->category == "logo") {
            if ($request->hasFile("header-logo") && $request->{'header-logo'}->isValid())
                Storage::putFileAs("public/logo", $request->file("header-logo"), "header-logo.png");
            if ($request->hasFile("footer-logo") && $request->{'footer-logo'}->isValid())
                Storage::putFileAs("public/logo", $request->file("footer-logo"), "footer-logo.png");
            if ($request->hasFile("cover") && $request->{'cover'}->isValid())
                Storage::putFileAs("public/logo", $request->file("cover"), "cover.png");
        }
        $settings = collect($request->except(["_token", "_method", "category"]))
            ->map(function ($value, $key) use ($request) {
                return [
                    'category' => $request->category,
                    'key' => $key,
                    'value' => $value
                ];
            })->toArray();
        cache()->forget('setting');
        return Setting::upsert($settings, ['key', 'category'], ['value']);
    }

    public static function getSitemapModuleList()
    {
        $arr = ["home"];
        if (ModuleEnum::Page->status()) array_push($arr, "static_pages");
        if (ModuleEnum::Blog->status()) array_push($arr, "blog", "blog_category", "blog_detail");
        if (ModuleEnum::Service->status()) array_push($arr, "service", "service_category", "service_detail");
        if (ModuleEnum::Product->status()) array_push($arr, "product", "product_category", "product_detail");
        if (ModuleEnum::Project->status()) array_push($arr, "project", "project_category", "project_detail");
        return $arr;
    }

    public static function getChangeFreqList(): array
    {
        return [
            "always" => __("admin/setting.sitemap_changefreq_always"),
            "hourly" => __("admin/setting.sitemap_changefreq_hourly"),
            "daily" => __("admin/setting.sitemap_changefreq_daily"),
            "weekly" => __("admin/setting.sitemap_changefreq_weekly"),
            "monthly" => __("admin/setting.sitemap_changefreq_monthly"),
            "yearly" => __("admin/setting.sitemap_changefreq_yearly"),
            "never" => __("admin/setting.sitemap_changefreq_never"),
        ];
    }
}
