<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Service;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Services\Admin\ServiceService;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;

class ServiceController extends Controller
{
    protected $service;
    protected $notification;

    public function __construct(ServiceService $service)
    {
        $this->service = $service;
        View::share([
            "categories" => $this->service->getCategories(ModuleEnum::Service),
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "module" => $this->service->module()
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

    public function store(StoreServiceRequest $request)
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

    public function edit(Service $service)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        try {
            $this->service->update($request->validated(), $service);
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

    public function destroy(Service $service)
    {
        try {
            $this->service->delete($service);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("deleted_success"));
        } catch (Throwable $e) {
            return back()
                ->withError($this->notification->alert("deleted_error"));
        }
    }
}
