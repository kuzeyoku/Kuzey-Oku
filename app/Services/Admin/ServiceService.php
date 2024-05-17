<?php

namespace App\Services\Admin;

use App\Models\Service;
use App\Models\ServiceTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ServiceService extends BaseService
{
    protected $service;

    public function __construct(Service $service)
    {
        parent::__construct($service, ModuleEnum::Service);
    }

    public function create(Request $request)
    {
        $arr = ["slug" => Str::slug($request->title[$this->defaultLocale])];

        $data = new Request(array_merge($arr, $request->only("status", "order", "category_id")));

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);

            if (isset($request->image) && $request->image->isValid()) {
                $query->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->document) && $request->document->isValid()) {
                $query->addMediaFromRequest("document")->usingFileName(Str::random(8) . "." . $request->document->extension())->toMediaCollection($this->module->DOCUMENT_COLLECTION());
            }
        }

        return $query;
    }

    public function update(Object $request, Model $service)
    {
        $arr = ["slug" => Str::slug($request->title[$this->defaultLocale])];

        $data = new Request(array_merge($arr, $request->only("status", "order", "category_id")));

        $query = parent::update($data, $service);

        if ($query) {
            $this->translations($service->id, $request);

            if (isset($request->imageDelete)) {
                $service->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->documentDelete)) {
                $service->clearMediaCollection($this->module->DOCUMENT_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $service->clearMediaCollection($this->module->COVER_COLLECTION());
                $service->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->document) && $request->document->isValid()) {
                $service->clearMediaCollection($this->module->DOCUMENT_COLLECTION());
                $service->addMediaFromRequest("document")->usingFileName(Str::random(8) . "." . $request->document->extension())->toMediaCollection($this->module->DOCUMENT_COLLECTION());
            }
        }

        return $query;
    }

    public function translations(int $serviceId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->description[$language->code])) {
                ServiceTranslate::updateOrCreate(
                    [
                        "service_id" => $serviceId,
                        "lang" => $language->code
                    ],
                    [
                        "title" => $request->title[$language->code] ?? null,
                        "description" => $request->description[$language->code] ?? null
                    ]
                );
            }
        }
    }
}
