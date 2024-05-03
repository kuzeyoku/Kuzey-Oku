<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Popup;
use App\Models\PopupTranslate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PopupService extends BaseService
{
    protected $imageService;
    protected $popup;

    public function __construct(Popup $popup)
    {
        parent::__construct($popup, ModuleEnum::Popup);
    }

    public function create(Object $request)
    {
        $data = new Request([
            "type" => $request->type,
            "video" => $request->video,
            "url" => $request->url,
            "setting" => json_encode([
                "time" => $request->time ?? 0,
                "width" => $request->width ?? 600,
                "closeOnEscape" => $request->closeOnEscape,
                "closeButton" => $request->closeButton,
                "overlayClose" => $request->overlayClose,
                "pauseOnHover" => $request->pauseOnHover,
                "fullScreenButton" => $request->fullScreenButton,
                "color" => $request->color ?? "#88A0B9",
            ]),
            "status" => $request->status,
        ]);

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);

            if (isset($request->image) && $request->image->isValid()) {
                $query->addMediaFromRequest('image')->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function update(Object $request, Model $popup)
    {
        $data = new Request([
            "type" => $request->type,
            "video" => $request->video,
            "url" => $request->url,
            "setting" => json_encode([
                "time" => $request->time ?? 0,
                "width" => $request->width ?? 600,
                "closeOnEscape" => $request->closeOnEscape,
                "closeButton" => $request->closeButton,
                "overlayClose" => $request->overlayClose,
                "pauseOnHover" => $request->pauseOnHover,
                "fullScreenButton" => $request->fullScreenButton,
                "color" => $request->color ?? "#88A0B9",
            ]),
            "status" => $request->status,

        ]);

        $query = parent::update($data, $popup);

        if ($query) {
            $this->translations($popup->id, $request);

            if (isset($request->imageDelete)) {
                parent::imageDelete($popup);
            }

            if (isset($request->image) && $request->image->isValid()) {
                $popup->clearMediaCollection($this->module->COVER_COLLECTION());
                $popup->addMediaFromRequest('image')->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }
        return $query;
    }

    public function translations(int $popupId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            PopupTranslate::updateOrCreate(
                [
                    "popup_id" => $popupId,
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
