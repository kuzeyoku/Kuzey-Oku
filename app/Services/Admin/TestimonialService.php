<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class TestimonialService extends BaseService
{

    protected $testimonial;

    public function __construct(Testimonial $testimonial)
    {
        parent::__construct($testimonial, ModuleEnum::Testimonial);
    }

    public function create(Object $request)
    {
        $data = new Request($request->only("name", "company", "position", "message", "order", "status"));

        $query = parent::create($data);

        if ($query->id) {
            if (isset($request->image) && $request->image->isValid()) {
                $query->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function update(Object $request, Model $testimonial)
    {
        $data = new Request($request->only("name", "company", "position", "message", "order", "status"));

        $query = parent::update($data, $testimonial);

        if ($query) {
            if (isset($request->imageDelete)) {
                $testimonial->clearMediaCollection($this->module->COVER_COLLECTION());
            }
            if (isset($request->image) && $request->image->isValid()) {
                $testimonial->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }
}
