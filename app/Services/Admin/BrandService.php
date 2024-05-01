<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BrandService extends BaseService
{
    protected $imageService;
    protected $brand;

    public function __construct(Brand $brand)
    {
        parent::__construct($brand, ModuleEnum::Brand);
        $this->imageService = new ImageService(ModuleEnum::Brand);
    }

    public function create(Object $request)
    {
        $data = new Request([
            "url" => $request->url,
            "title" => $request->title,
            "order" => $request->order,
            "status" => $request->status
        ]);

        $query = parent::create($data);

        if (isset($request->image) && $request->image->isValid()) {
            $query->addMediaFromRequest("image")->toMediaCollection("image");
        }

        return $query;
    }

    public function update(Object $request, Model $brand)
    {
        $data = new Request([
            "url" => $request->url,
            "title" => $request->title,
            "order" => $request->order,
            "status" => $request->status
        ]);

        if (isset($request->imageDelete)) {
            $brand->clearMediaCollection("image");
        }

        if (isset($request->image) && $request->image->isValid()) {
            $brand->clearMediaCollection("image");
            $brand->addMediaFromRequest("image")->toMediaCollection("image");
        }

        return parent::update($data, $brand);
    }
}
