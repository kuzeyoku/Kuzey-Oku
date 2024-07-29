<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Reference;
use Illuminate\Http\Request;
use App\Services\Admin\ReferenceService;
use App\Http\Requests\Reference\StoreReferenceRequest;
use App\Http\Requests\Reference\UpdateReferenceRequest;
use Illuminate\Support\Facades\View;

class ReferenceController extends Controller
{

    protected $service;
    public function __construct(ReferenceService $service)
    {
        $this->service = $service;
        View::share([
            'route' => $this->service->route(),
            'folder' => $this->service->folder(),
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

    public function store(StoreReferenceRequest $request)
    {
        try {
            $this->service->create($request);
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log"));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        }
    }

    public function edit(Reference $reference)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact("reference"));
    }

    public function update(UpdateReferenceRequest $request, Reference $reference)
    {
        try {
            $this->service->update($request, $reference);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log"));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
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
                ->withError(__("admin/{$this->service->folder()}.status_error"));
        }
    }

    public function destroy(Reference $reference)
    {
        try {
            $this->service->delete($reference);
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log"));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        }
    }
}
