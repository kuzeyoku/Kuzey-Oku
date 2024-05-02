<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Models\ProductTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ProductService extends BaseService
{
    protected $product;

    public function __construct(Product $product)
    {
        parent::__construct($product, ModuleEnum::Product);
    }

    public function create(Object $request)
    {
        $data = new Request([
            "slug" => Str::slug($request->title[$this->defaultLocale]),
            "status" => $request->status,
            "category_id" => $request->category_id,
            "video" => $request->video,
            "order" => $request->order,
        ]);

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);

            if (isset($request->image) && $request->image->isValid()) {
                $query->addMediaFromRequest("image")->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function update(Object $request, Model $product)
    {
        $data = new Request([
            "slug" => Str::slug($request->title[$this->defaultLocale]),
            "order" => $request->order,
            "status" => $request->status,
            "category_id" => $request->category_id,
            "video" => $request->video,
        ]);

        $query = parent::update($data, $product);

        if (isset($request->imageDelete)) {
            $product->clearMediaCollection($this->module->COVER_COLLECTION());
        }

        if (isset($request->image) && $request->image->isValid()) {
            $product->clearMediaCollection($this->module->COVER_COLLECTION());
            $product->addMediaFromRequest("image")->toMediaCollection($this->module->COVER_COLLECTION());
        }

        if ($query) {
            $this->translations($product->id, $request);
        }

        return $query;
    }

    public function translations(int $productId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->content[$language->code])) {
                ProductTranslate::updateOrCreate(
                    [
                        "product_id" => $productId,
                        "lang" => $language->code
                    ],
                    [
                        "title" => $request->title[$language->code] ?? null,
                        "description" => $request->description[$language->code] ?? null,
                        "features" => trim($request->features[$language->code]) ?? null
                    ]
                );
            }
        }
    }

    public function imageUpload(Model $product)
    {
        return $product->addMediaFromRequest("file")->toMediaCollection($this->module->IMAGE_COLLECTION());
    }

    public function delete(Model $product)
    {
        return parent::delete($product);
    }
}
