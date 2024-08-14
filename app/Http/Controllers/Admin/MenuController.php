<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Menu;
use App\Services\Admin\MenuService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Services\Admin\NotificationService;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;

class MenuController extends Controller
{
    protected $service;
    protected $notification;

    public function __construct(MenuService $service)
    {
        $this->service = $service;
        $this->notification = new NotificationService($this->service->module());
        View::share([
            'route' => $this->service->route(),
            'folder' => $this->service->folder()
        ]);
    }

    public function index()
    {
        $data = $this->getData();
        $data["menu"] = null;
        return view(themeView("admin", "{$this->service->folder()}.index"), $data);
    }

    public function edit(Menu $menu)
    {
        $data = $this->getData($menu);
        $data["menu"] = $menu;
        return view(themeView("admin", "{$this->service->folder()}.index"), $data);
    }

    private function getData($menu = null)
    {
        $getMenuData = Menu::order()->get();
        $parents = $getMenuData->whereNotIn("id", [optional($menu)->id] ?? []);
        $data["menus"] = $getMenuData;
        $data["parentList"] = $parents->pluck("title", "id");
        $data["urlList"] = $this->service->getUrlList();
        return $data;
    }

    public function store(StoreMenuRequest $request)
    {
        try {
            $this->service->create($request->validated());
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("created_success"));
        } catch (Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError($this->notification->alert("created_error"));
        }
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        try {
            $this->service->update($request->validated(), $menu);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("updated_success"));
        } catch (Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError($this->notification->alert("updated_error"));
        }
    }

    public function destroy(Menu $menu)
    {
        try {
            $this->service->delete($menu);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("deleted_success"));
        } catch (Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError($this->notification->alert("deleted_error"));
        }
    }
}
