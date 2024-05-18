<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\MediaService;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{

    protected $service;

    public function __construct(MediaService $service)
    {
        $this->service = $service;
        view()->share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder()
        ]);
    }

    public function index()
    {
        $items = Media::orderByDesc("id")->paginate(18);
        return view(themeView("admin", "{$this->service->folder()}.index"), compact("items"));
    }

    public function destroy($media_id)
    {
        try {
            $media = Media::findOrFail($media_id);
            $media->delete();
            return back()->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withErrors(__("admin/{$this->service->folder()}.delete_error"));
        }
    }
}
