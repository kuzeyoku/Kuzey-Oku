<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Category;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    private $fileService;

    public function __construct(private Model $model, private ModuleEnum $module)
    {
        $this->fileService = new FileService($module->COVER_COLLECTION());
    }

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
        if (settings("caching.status", StatusEnum::Passive->value) ==  StatusEnum::Active->value)
            return Cache::remember($this->module->value . '_' . (Paginator::resolveCurrentPage() ?: 1) . "_" . app()->getLocale() . "_admin", settings("caching.time", env("CACHE_TIME")), function () {
                return $this->model->orderByDesc("id")->paginate(settings("pagination.admin", 15));
            });
        else
            return $this->model->orderByDesc("id")->paginate(settings("pagination.admin", 15));
    }

    public function create(array $request)
    {
        try {
            $item = $this->model->create($request);
            $this->translations($item, $request);
            $this->fileService->upload($item, $request);
            $this->cacheClear();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update(array $request, Model $item)
    {
        try {
            $item->update($request);
            $this->translations($item, $request);
            $this->fileService->upload($item, $request);
            $this->cacheClear();
            return true;
        } catch (\Exception $e) {
            return false;
        }
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
                $titles = $categories->pluck("titles." . app()->getFallbackLocale(), "id");
                return $titles->toArray();
            });
        } else {
            $categories = Category::whereStatus(StatusEnum::Active->value)
                ->when($this->module !== null, function ($query) {
                    return $query->where("module", $this->module);
                })
                ->get();
            $titles = $categories->pluck("titles." . app()->getFallbackLocale(), "id");
            return $titles->toArray();
        }
    }

    public function cacheClear()
    {
        $currentpage = Paginator::resolveCurrentPage() ?: 1;
        for ($i = 1; $i <= $currentpage; $i++) {
            if (Cache::has($this->module->value . '_' . $i . "_" . app()->getLocale() . "_admin")) {
                Cache::forget($this->module->value . '_' . $i . "_" . app()->getLocale() . "_admin");
            }
        }
        if (Cache::has(($this->module ? $this->module->value . "_" : "all_") . "categories")) {
            Cache::forget(($this->module ? $this->module->value . "_" : "all_") . "categories");
        }
    }
}
