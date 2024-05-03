<?php

namespace App\Services\Admin;

use App\Models\Project;
use App\Models\ProjectTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ProjectService extends BaseService
{
    protected $project;

    public function __construct(Project $project)
    {
        parent::__construct($project, ModuleEnum::Project);
    }

    public function create(Object $request)
    {
        $arr = ["slug" => Str::slug($request->title[$this->defaultLocale])];

        $data = new Request(array_merge($arr, $request->only("status", "order", "category_id", "video", "model3D")));

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);

            if (isset($request->image) && $request->image->isValid()) {
                $query->addMediaFromRequest("image")->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function update(Object $request, Model $project)
    {
        $arr = ["slug" => Str::slug($request->title[$this->defaultLocale])];

        $data = new Request(array_merge($arr, $request->only("status", "order", "category_id", "video", "model3D")));

        $query = parent::update($data, $project);

        if ($query) {
            $this->translations($project->id, $request);

            if (isset($request->imageDelete)) {
                $project->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $project->clearMediaCollection($this->module->COVER_COLLECTION());
                $project->addMediaFromRequest("image")->toMediaCollection($this->module->COVER_COLLECTION());
            }
        }

        return $query;
    }

    public function translations(int $projectId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->description[$language->code])) {
                ProjectTranslate::updateOrCreate(
                    [
                        "project_id" => $projectId,
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

    public function imageUpload(Model $project)
    {
        return $project->addMediaFromRequest("file")->toMediaCollection($this->module->IMAGE_COLLECTION());
    }

    public function delete(Model $project)
    {
        return parent::delete($project);
    }
}
