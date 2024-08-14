<?php

namespace App\Services\Admin;

use Illuminate\Support\Str;

class FileService
{
    public function __construct(private string $collection) {}

    public function upload($item, $request)
    {
        try {
            if ($request->imageDelete) {
                $this->delete($item);
            }
            if (isset($request->image) && $request->image->isValid()) {
                if ($item->hasMedia($this->collection)) {
                    $this->delete($item);
                }
                $item->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->collection);
            }
        } catch (\Exception $e) {
            //Exception
        }
    }

    public function delete($item)
    {
        try {
            $item->clearMediaCollection($this->collection);
        } catch (\Exception $e) {
            //Exception
        }
    }
}
