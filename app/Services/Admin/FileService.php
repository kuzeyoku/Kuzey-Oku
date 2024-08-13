<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use Illuminate\Support\Str;

class FileService
{
    protected $module;

    public function __construct(ModuleEnum $module)
    {
        $this->module = $module;
    }

    public function upload($item, $request)
    {
        try {
            if ($request->imageDelete) {
                $this->delete($item);
            }
            if (isset($request->image) && $request->image->isValid()) {
                if ($item->hasMedia($this->module->COVER_COLLECTION())) {
                    $this->delete($item);
                }
                $item->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
            }
        } catch (\Exception $e) {
            //Exception
        }
    }

    public function delete($item)
    {
        try {
            $item->clearMediaCollection($this->module->COVER_COLLECTION());
        } catch (\Exception $e) {
            //Exception
        }
    }
}
