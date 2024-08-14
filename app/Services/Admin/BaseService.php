<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class BaseService
{

    public function __construct(private Model $model, private ModuleEnum $module) {}

    public function folder()
    {
        return $this->module->folder();
    }

    public function route()
    {
        return $this->module->route();
    }

    public function module()
    {
        return $this->module;
    }

    public function all()
    {
        $cacheTags = [$this->module->value, 'admin', app()->getLocale()];
        $cacheKey = $this->module->value . '_' . (Paginator::resolveCurrentPage() ?: 1) . "_" . app()->getLocale() . "_admin";

        if (settings("caching.status", StatusEnum::Passive->value) == StatusEnum::Active->value) {
            return Cache::tags($cacheTags)->remember($cacheKey, settings("caching.time", env("CACHE_TIME")), function () {
                return $this->model->orderByDesc("id")->paginate(settings("pagination.admin", 15));
            });
        } else {
            return $this->model->orderByDesc("id")->paginate(settings("pagination.admin", 15));
        }
    }

    public function create(array $request)
    {
        $item = $this->model->create($request);
        $this->translations($item, $request);
        $fileService = new FileService("image", $this->module->COVER_COLLECTION());
        $fileService->upload($item, $request);
        $this->cacheClear();
    }

    public function update(array $request, Model $item)
    {
        $item->update($request);
        $this->translations($item, $request);
        $fileService = new FileService("image", $this->module->COVER_COLLECTION());
        $fileService->upload($item, $request);
        $this->cacheClear();
    }

    public function translations($item, $request)
    {
        if (method_exists($item, 'translate')) {
            languageList()->each(function ($lang) use ($item, $request) {
                if ($item->translate()) {
                    $item->translate()->updateOrCreate(
                        [
                            "lang" => $lang->code
                        ],
                        [
                            "title" => array_key_exists("title", $request) ? $request["title"][$lang->code] : null,
                            "description" => array_key_exists("description", $request) ? $request["description"][$lang->code] : null,
                            "tags" => array_key_exists("tags", $request) ? $request["tags"][$lang->code] : null,
                        ]
                    );
                }
            });
        }
    }


    public function statusUpdate(Request $request, int $itemID)
    {
        $this->cacheClear();
        $item = $this->model->find($itemID);
        return $item->update($request->only("status"));
    }

    public function delete(Model $item)
    {
        $this->cacheClear();
        return $item->delete();
    }

    public function imageUpload(Request $request, Model $item)
    {
        $fileService = new FileService("file", $this->module->IMAGE_COLLECTION());
        return $fileService->upload($item, $request);
    }

    public function imageDelete(Model $item)
    {
        return $item->delete();
    }

    public function imageAllDelete(Model $item)
    {
        return $item->clearMediaCollection($this->module->IMAGE_COLLECTION());
    }

    public function getCategories()
    {
        if (settings("caching.status", StatusEnum::Passive->value) ==  StatusEnum::Active->value) {
            $cacheKey = ($this->module ? $this->module->value . "_" : "all_") . "categories";
            return Cache::remember($cacheKey, settings("caching.time", env("CACHE_TIME")), function () {
                $categories = Category::whereStatus(StatusEnum::Active->value)
                    ->when($this->module !== null, function ($query) {
                        return $query->where("module", $this->module);
                    })
                    ->get();
                return $categories->pluck("titles." . app()->getFallbackLocale(), "id")->toArray();
            });
        } else {
            $categories = Category::whereStatus(StatusEnum::Active->value)
                ->when($this->module !== null, function ($query) {
                    return $query->where("module", $this->module);
                })
                ->get();
            return $categories->pluck("titles." . app()->getFallbackLocale(), "id")->toArray();
        }
    }

    public function cacheClear()
    {
        // Modül bazında etiketleme kullanarak önbelleği temizle
        $moduleTag = $this->module ? $this->module->value : "all";
        $localeTag = app()->getLocale() . "_admin";

        // Belirli modül ve dil etiketlerine sahip önbelleği temizle
        Cache::tags([$moduleTag, $localeTag])->flush();

        // Kategoriler için özel etiketleme
        Cache::tags([$moduleTag . "_categories"])->flush();
    }
}
