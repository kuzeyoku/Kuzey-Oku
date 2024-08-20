<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Reference;
use App\Models\Service;
use App\Services\SeoService;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        SeoService::set();

        $data["slider"] = Cache::remember("slider_home_" . app()->getLocale(), config("cache.time", 3600), function () {
            return Slider::active()->order()->get();
        });

        $data["service"] = Cache::remember("service_home_" . app()->getLocale(), config("cache.time", 3600), function () {
            return Service::active()->order()->limit(6)->get();
        });

        $data["project"] = Cache::remember("project_home_" . app()->getLocale(), config("cache.time", 3600), function () {
            return Project::active()->order()->get();
        });

        $data["blog"] = Cache::remember("blog_home_" . app()->getLocale(), config("cache.time", 3600), function () {
            return Blog::active()->order()->limit(3)->get();
        });

        $data["reference"] = Cache::remember("reference_home_" . app()->getLocale(), config("cache.time", 3600), function () {
            return Reference::active()->order()->get();
        });

        if (config("information.about_page", false)) {
            $data["about"] = Cache::remember("about_home_" . app()->getLocale(), config("cache.time", 3600), function () {
                return Page::findOrFail(config("information.about_page"));
            });
        }
        return view("index", $data);
    }
}
