<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
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
            if (config("setting.caching.status", StatusEnum::Passive->value) == StatusEnum::Active->value) {
                $data[$module->value] = Cache::remember($module->value . "_home_" . app()->getLocale(), config("setting.caching.time", 3600), function () use ($module, $model) {
                    return $model::active()->order()->limit($module->homeLimit())->get();
                });
            } else {
                $data[$module->value] = $model::active()->order()->limit($module->homeLimit())->get();
            };
        }

        if (config("setting.information.about_page", false)) {
            $data["about"] = Cache::remember("about_home", config("setting.caching.time", 3600), function () {
                return Page::findOrFail(config("setting.information.about_page"));
            });
        }
        return view("index", $data);
    }
}
