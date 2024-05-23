<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Page;
use App\Models\PageTranslate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PageService extends BaseService

{
    protected $page;

    public function __construct(Page $page)
    {
        parent::__construct($page, ModuleEnum::Page);
    }

    public function create(Request $request)
    {
        $query = parent::create(new Request($request->only("status")));

        if ($query->id) {
            $this->translations($query->id, $request);
        }

        return $query;
    }

    public function update(Request $request, Model $page)
    {
        $query = parent::update(new Request($request->only("status")), $page);

        if ($query) {
            $this->translations($page->id, $request);
        }

        return $query;
    }

    public function translations(int $pageId, Request $request)
    {
        $languages = languageList();

        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->description[$language->code])) {
                PageTranslate::updateOrCreate(
                    [
                        "page_id" => $pageId,
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
