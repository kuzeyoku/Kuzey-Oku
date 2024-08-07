<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Services\Admin\BrandService;
use Illuminate\Support\Facades\View;
use App\Services\Admin\NotificationService;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;

class BrandController extends Controller
{
    protected $service;
    protected $notification;

    public function __construct(BrandService $service)
    {
        $this->service = $service;
        $this->notification = new NotificationService($this->service->module());
        View::share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->folder()}.index"), compact("items"));
    }

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreBrandRequest $request)
    {
        try {
            $this->service->create($request);
            LogController::logger("info", $this->notification->log("created", ["title" => $request->title]));
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

    public function edit(Brand $brand)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact("brand"));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        try {
            $this->service->update($request, $brand);
            LogController::logger("info", $this->notification->log("updated", ["title" => $request->title]));
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

    public function destroy(Brand $brand)
    {
        try {
            LogController::logger("info", $this->notification->log("deleted", ["title" => $brand->title]));
            $this->service->delete($brand);
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
