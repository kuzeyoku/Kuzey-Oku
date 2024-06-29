<?php

namespace App\Services\Admin;

use App\Models\Setting;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
            $arr = ["header-logo", "footer-logo", "cover", "favicon"];
            foreach ($arr as $key) {
                if ($request->hasFile($key)) {
                    $media = Media::create([
                        "model_type" => Setting::class,
                        "model_id" => 1,
                        "collection_name" => $key,
                        "name" => $key,
                        "disk" => "media",
                        "manipulations" => [],
                        "custom_properties" => [],
                        "responsive_images" => [],
                        "generated_conversions" => [],
                        "file_name" => $key,
                        "mime_type" => "image/png",
                        "size" => $request->file($key)->getSize(),
                    ]);
                    $media->copy($request->file($key)->getRealPath());
                }
            }
        }
        $except = $request->except("_token", "_method", "category");
        if ($request->category == "social") {
            $platforms = array_filter($except, function ($value) {
                return $value;
            });
            settings()->set("social.platforms", array_keys($platforms));
        }
        $settings = array_reduce(array_keys($except), function ($result, $key) use ($except, $request) {
            $result[$request->category . "." . $key] = $except[$key];
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
