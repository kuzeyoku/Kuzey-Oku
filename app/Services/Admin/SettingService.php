<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\ThemeAsset;
use Illuminate\Http\Request;

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

    public function mediaKeys(): array
    {
        return ["header-logo", "footer-logo", "cover", "favicon"];
    }

    public function getMedia($key): ?string
    {
        $medias = cache()->remember("general_media", 60 * 60 * 24, function () {
            return ThemeAsset::all();
        });
        $media = $medias->where("name", $key)->first();
        return $media ? $media->getFirstMediaUrl($key) : null;
    }

    public function update(Request $request)
    {
        if ($request->category == "logo") {
            foreach ($request->files as $key => $file) {
                if (in_array($key, $this->mediaKeys()) && $request->hasFile($key)) {
                    $media = ThemeAsset::where("name", $key)->first();
                    if ($media) {
                        $media->clearMediaCollection($key);
                    } else {
                        $media = ThemeAsset::create(["name" => $key]);
                    }
                    try {
                        $media->addMediaFromRequest($key)->usingFileName($key . "." . $request->{$key}->extension())->toMediaCollection($key);
                        cache()->forget("general_media");
                    } catch (\Exception $e) {
                        //Exception
                    }
                }
            }
            return;
        }
        $except = $request->except("_token", "_method", "category");
        $settings = array_reduce(array_keys($except), function ($result, $key) use ($except, $request) {
            $result[$request->category . "." . $key] = $except[$key];
            if ($request->category == "social") {
                $result["social.platforms"] = array_keys(array_filter($except, function ($value) {
                    return $value;
                }));
            }
            return $result;
        }, []);
        return settings($settings);
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
