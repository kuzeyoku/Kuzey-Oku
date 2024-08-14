<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Services\Admin\ProjectService;
use App\Http\Requests\Project\ImageProjectRequest;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProjectController extends Controller
{
    protected $service;
    protected $notification;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
        View::share([
            "categories" => $this->service->getCategories(),
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "module" => $this->service->module()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->folder()}.index"), compact("items"));
    }

    public function image(Project $project)
    {
        return view(themeView("admin", "layout.image"), compact("project"));
    }

    public function imageStore(ImageProjectRequest $request, Project $project): object
    {
        if ($this->service->imageUpload($request, $project)) {
            return (object) [
                "message" => __("admin/alert.default_success")
            ];
        } else {
            return (object) [
                "message" => __("admin/alert.default_error")
            ];
        }
    }

    public function imageDelete(Media $image)
    {
        try {
            $this->service->imageDelete($image);
            return back()
                ->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()
                ->withError(__("admin/alert.default_error"));
        }
    }

    public function imageAllDelete(Project $project)
    {
        try {
            $this->service->imageAllDelete($project);
            return back()
                ->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()
                ->withError(__("admin/alert.default_error"));
        }
    }

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            $this->service->create($request->validated());
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("created_success"));
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withError($this->notification->alert("created_error"));
        }
    }

    public function edit(Project $project)
    {
        return view(themeView("admin", "{$this->service->folder()}/edit"), compact("project"));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            $this->service->update($request->validated(), $project);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("updated_success"));
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withError($this->notification->alert("updated_error"));
        }
    }

    public function statusUpdate(Request $request, int $page)
    {
        $request->validate(["status" => "required"]);
        try {
            $this->service->statusUpdate($request, $page);
            return back();
        } catch (Throwable $e) {
            return back()
                ->withError(__("admin/alert.default_error"));
        }
    }

    public function destroy(Project $project)
    {
        try {
            $this->service->delete($project);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("deleted_success"));
        } catch (Throwable $e) {
            return back()
                ->withError($this->notification->alert("deleted_error"));
        }
    }
}
