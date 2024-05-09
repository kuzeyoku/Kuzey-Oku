<?php

namespace App\Services\Admin;

use App\Models\Slider;
use App\Models\SliderTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class SliderService extends BaseService
{

    protected $slider;

    public function __construct(Slider $slider)
    {
        parent::__construct($slider, ModuleEnum::Slider);
    }

    public function create(Request $request)
    {
        $data = new Request($request->only("button", "video", "order", "status"));

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);

            if (isset($request->image) && $request->image->isValid()) {
                $query->addMediaFromRequest("image")->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function update(Object $request, Model $slider)
    {
        $data = new Request($request->only("button", "video", "order", "status"));

        $query = parent::update($data, $slider);

        if ($query) {
            $this->translations($slider->id, $request);

            if (isset($request->imageDelete)) {
                $slider->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $slider->clearMediaCollection($this->module->COVER_COLLECTION());
                $slider->addMediaFromRequest("image")->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function translations(int $sliderId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->description[$language->code])) {
                SliderTranslate::updateOrCreate(
                    [
                        "slider_id" => $sliderId,
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
