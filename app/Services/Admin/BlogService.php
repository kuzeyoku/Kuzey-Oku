<?php

namespace App\Services\Admin;

use App\Models\Blog;
use App\Models\BlogTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BlogService extends BaseService
{
    protected $blog;

    public function __construct(Blog $blog)
    {
        parent::__construct($blog, ModuleEnum::Blog);
    }

    public function create(Request $request)
    {
        $arr = [
            "slug" => Str::slug($request->title[$this->defaultLocale]),
        ];

        $data = new Request(array_merge($arr, $request->only("status", "order", "category_id")));

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);

            if (isset($request->image) && $request->image->isValid()) {
                $query->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->withResponsiveImages()->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function update(Request $request, Model $post)
    {
        $arr = [
            "slug" => Str::slug($request->title[$this->defaultLocale]),
        ];

        $data = new Request(array_merge($arr, $request->only("status", "order", "category_id")));

        $query = parent::update($data, $post);

        if ($query) {
            $this->translations($post->id, $request);

            if (isset($request->imageDelete)) {
                $post->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $post->clearMediaCollection($this->module->COVER_COLLECTION());
                $post->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->withResponsiveImages()->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function translations(int $pageId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->content[$language->code])) {
                BlogTranslate::updateOrCreate(
                    [
                        "post_id" => $pageId,
                        "lang" => $language->code
                    ],
                    [
                        "title" => $request->title[$language->code] ?? null,
                        "description" => $request->description[$language->code] ?? null,
                        "tags" => $request->tags[$language->code] ?? null,
                    ]
                );
            }
        }
    }
}
