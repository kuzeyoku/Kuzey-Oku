<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Services\Admin\SliderService;
use App\Services\Admin\NotificationService;
use App\Http\Requests\Slider\StoreSliderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;

class SliderController extends Controller
{
    protected $service;
    protected $notification;

    public function __construct(SliderService $service)
    {
        $this->service = $service;
        $this->notification = new NotificationService($this->service->module());
        View::share([
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

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreSliderRequest $request)
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

    public function edit(Slider $slider)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact("slider"));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        try {
            $this->service->update($request, $slider);
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

    public function destroy(Slider $slider)
    {
        try {
            LogController::logger("info", $this->notification->log("deleted", ["title" => $slider->title]));
            $this->service->delete($slider);
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
