<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        SEOTools::setTitle(settings("settings.title", config("app.name")));
        SEOTools::setDescription(settings("settings.description"));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->setTitle(settings("general.title", config("app.name")));
        SEOTools::opengraph()->setSiteName(settings("general.title", config("app.name")));
        SEOTools::opengraph()->setDescription(settings("general.description"));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setTitle(settings("general.title", config("app.name")));
        SEOTools::jsonLd()->setTitle(settings("general.title", config("app.name")));
        SEOTools::jsonLd()->setDescription(settings("general.description"));
        SEOTools::jsonLd()->setTitle(settings("general.title", config("app.name")));
        SEOTools::jsonLd()->setDescription(settings("general.description"));
        SEOTools::jsonLd()->setType('WebSite');

        $modules = [
            ModuleEnum::Slider,
            ModuleEnum::Product,
            ModuleEnum::Service,
            ModuleEnum::Brand,
            ModuleEnum::Project,
            ModuleEnum::Testimonial,
            ModuleEnum::Blog,
            ModuleEnum::Reference,
        ];

        $data = [];

        foreach ($modules as $module) {
            $model = $module->model();
            if (settings("caching.status", StatusEnum::Passive->value) == StatusEnum::Active->value) {
                $data[$module->value] = Cache::remember($module->value . "_home_" . app()->getLocale(), settings("caching.time", 3600), function () use ($module, $model) {
                    return $model::active()->order()->limit($module->homeLimit())->get();
                });
            } else {
                $data[$module->value] = $model::active()->order()->limit($module->homeLimit())->get();
            };
        }

        if (settings("information.about_page", false)) {
            $data["about"] = Cache::remember("about_home_" . app()->getLocale(), settings("caching.time", 3600), function () {
                return Page::findOrFail(settings("information.about_page"));
            });
        }
        return view("index", $data);
    }
}
