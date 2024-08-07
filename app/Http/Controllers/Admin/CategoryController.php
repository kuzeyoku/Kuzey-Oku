<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Category;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Services\Admin\CategoryService;
use App\Services\Admin\NotificationService;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $service;
    protected $modules;
    protected $notification;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
        $this->notification = new NotificationService($this->service->module());
        $this->modules = ModuleEnum::toSelectArray();
        View::share([
            "categories" => $this->service->getCategories(),
            "modules" => $this->modules,
            "route" => $this->service->route(),
            "folder" => $this->service->folder()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->folder()}.index"), compact('items'));
    }

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $this->service->create($request);
            LogController::logger("info", $this->notification->log("created", ["title" => $request->title[app()->getFallbackLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("created_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError($this->notification->alert("created_error"));
        }
    }

    public function edit(Category $category)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $this->service->update($request, $category);
            LogController::logger("info", $this->notification->log("updated", ["title" => $category->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("updated_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
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
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/alert.default_error"));
        }
    }

    public function destroy(Category $category)
    {
        try {
            LogController::logger("info", $this->notification->log("deleted", ["title" => $category->title]));
            $this->service->delete($category);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("deleted_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError($this->notification->alert("deleted_error"));
        }
    }
}
