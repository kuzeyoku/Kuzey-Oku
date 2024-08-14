<?php

namespace App\Services\Admin;

use App\Models\Menu;
use App\Models\Page;
use App\Enums\ModuleEnum;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class MenuService extends BaseService
{
    protected $menu;

    public function __construct(Menu $menu)
    {
        parent::__construct($menu, ModuleEnum::Menu);
    }

    public function delete(Model $menu)
    {
        $query = parent::delete($menu);

        if ($query) {
            Menu::whereParentId($menu->id)->delete();
        }
        return $query;
    }

    public function getUrlList(): array
    {

        $pages = Cache::remember("pages_menu_list", settings("caching.time", 3600), function () {
            return Page::active()->get()->each(function ($item) {
                $item->title = $item->title;
                $item->url = $item->url;
            })->pluck("title", "url");
        });

        return [
            route("home") => __("admin/general.home"),
            route(ModuleEnum::Blog->Route() . ".index") => ModuleEnum::Blog->singleTitle(),
            route(ModuleEnum::Service->Route() . ".index") => ModuleEnum::Service->singleTitle(),
            //route(ModuleEnum::Product->Route() . ".index") => ModuleEnum::Product->singleTitle(),
            route(ModuleEnum::Project->Route() . ".index") => ModuleEnum::Project->singleTitle(),
            //route(ModuleEnum::Reference->Route() . ".index") => ModuleEnum::Reference->singleTitle(),
            route("contact.index") => __("front/contact.txt1"),
            "Sayfalar" => $pages ?? [],
        ];
    }
}
