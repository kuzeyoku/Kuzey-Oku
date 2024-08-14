<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Popup;
use Illuminate\Http\Request;
use App\Services\Admin\PopupService;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Popup\StorePopupRequest;
use App\Http\Requests\Popup\UpdatePopupRequest;

class PopupController extends Controller
{
    protected $service;
    protected $notification;

    public function __construct(PopupService $service)
    {
        $this->service = $service;
        View::share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "module" => $this->service->module()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->route()}.index"), compact("items"));
    }

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StorePopupRequest $request)
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

    public function edit(Popup $popup)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact("popup"));
    }

    public function update(UpdatePopupRequest $request, Popup $popup)
    {
        try {
            $this->service->update($request->validated(), $popup);
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

    public function destroy(Popup $popup)
    {
        try {
            $this->service->delete($popup);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("deleted_success"));
        } catch (Throwable $e) {
            return back()
                ->withError($this->notification->alert("deleted_error"));
        }
    }
}
