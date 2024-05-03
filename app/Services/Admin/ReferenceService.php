<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ReferenceService extends BaseService
{
    protected $reference;

    public function __construct(Reference $reference)
    {
        parent::__construct($reference, ModuleEnum::Reference);
    }

    public function create(Object $request)
    {
        $data = new Request($request->only("url", "order", "status"));

        $query = parent::create($data);

        if ($query->id) {
            if (isset($request->image) && $request->image->isValid()) {
                $query->addMediaFromRequest("image")->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function update(Object $request, Model $reference)
    {
        $data = new Request($request->only("url", "order", "status"));

        $query = parent::update($data, $reference);

        if ($query) {
            if (isset($request->imageDelete)) {
                $reference->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $reference->clearMediaCollection($this->module->COVER_COLLECTION());
                $reference->addMediaFromRequest("image")->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }
}
