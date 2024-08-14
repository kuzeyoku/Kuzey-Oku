<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Services\Admin\LanguageService;
use App\Http\Requests\Language\StoreLanguageRequest;
use App\Http\Requests\Language\UpdateLanguageRequest;

class LanguageController extends Controller
{
    protected $service;
    protected $notification;

    public function __construct(LanguageService $languageService)
    {
        $this->service = $languageService;
        View::share([
            'route' => $this->service->route(),
            'folder' => $this->service->folder()
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

    public function store(StoreLanguageRequest $request)
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

    public function edit(Language $language)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact('language'));
    }

    public function files(Language $language)
    {
        $response = $this->service->files($language);
        $frontFiles = $response['frontFiles'] ?? [];
        $adminFiles = $response['adminFiles'] ?? [];
        $fileContent = $response['fileContent'] ?? [];
        $filename = $response['filename'] ?? null;
        $dir = $response['folder'] ?? null;
        return view(themeView("admin", "{$this->service->folder()}.files"), compact('language', 'frontFiles', 'adminFiles', 'fileContent', 'filename', 'dir'));
    }

    public function updateFileContent(Language $language, Request $request)
    {
        try {
            $this->service->updateFileContent($language);
            return back()->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()->withError(__("admin/alert.default_error"));
        }
    }

    public function update(UpdateLanguageRequest $request, Language $language)
    {
        try {
            $this->service->update($request->validated(), $language);
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

    public function destroy(Language $language)
    {
        try {
            $this->service->delete($language);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("deleted_success"));
        } catch (Throwable $e) {
            return back()
                ->withError($this->notification->alert("deleted_error"));
        }
    }
}
