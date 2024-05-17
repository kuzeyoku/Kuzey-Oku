<?php

namespace App\Services\Admin;

use App\Models\Brand;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BrandService extends BaseService
{
    protected $imageService;
    protected $brand;

    public function __construct(Brand $brand)
    {
        parent::__construct($brand, ModuleEnum::Brand);
    }

    public function create(Object $request)
    {
        $data = new Request($request->only("url", "title", "order", "status"));

        $query = parent::create($data);

        if ($query->id) {
            if (isset($request->image) && $request->image->isValid()) {
                $query->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function update(Object $request, Model $brand)
    {
        $data = new Request($request->only("url", "title", "order", "status"));

        $query = parent::update($data, $brand);

        if ($query) {
            if (isset($request->imageDelete)) {
                $brand->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $brand->clearMediaCollection($this->module->COVER_COLLECTION());
                $brand->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }
}
