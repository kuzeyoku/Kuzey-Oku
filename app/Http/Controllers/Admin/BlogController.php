<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Blog;
use App\Enums\StatusEnum;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Services\Admin\BlogService;
use App\Services\Admin\NotificationService;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use Spatie\Activitylog\ActivityLogger;

class BlogController extends Controller
{
    protected $service;
    protected $notification;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
        $this->notification = new NotificationService($this->service->module());
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

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreBlogRequest $request)
    {
        try {
            $this->service->create($request);
            activity()->event("created")->log($this->notification->log("created", ["title" => $request->title[app()->getFallbackLocale()]]));
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

    public function edit(Blog $blog)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact("blog"));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        try {
            $this->service->update($request, $blog);
            LogController::logger("info", $this->notification->log("updated", ["title" => $blog->title]));
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

    public function destroy(Blog $blog)
    {
        try {
            LogController::logger("info", $this->notification->log("deleted", ["title" => $blog->title]));
            $this->service->delete($blog);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("deleted_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError($this->notification->alert("deleted_error"));
        }
    }

    public function comment(Blog $blog)
    {
        $items = $blog->comments()->paginate(settings("pagination.admin", 15));
        return view(themeView("admin", "{$this->service->folder()}.comment"), compact("items"));
    }

    public function comments()
    {
        $items = BlogComment::orderBy("id", "DESC")->paginate(settings("pagination.admin", 15));
        return view(themeView("admin", "{$this->service->folder()}.comment"), compact("items"));
    }

    public function comment_approve(BlogComment $comment)
    {
        try {
            $comment->status = StatusEnum::Active->value;
            $comment->save();
            return back()->withSuccess(__("admin/alert.default_success"));
        } catch (\Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()->withError(__("admin/alert.default_error"));
        }
    }

    public function comment_disapprove(BlogComment $comment)
    {
        try {
            $comment->status = StatusEnum::Passive->value;
            $comment->save();
            return back()->withSuccess(__("admin/alert.default_success"));
        } catch (\Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()->withError(__("admin/alert.default_error"));
        }
    }

    public function comment_delete(BlogComment $comment)
    {
        try {
            $comment->delete();
            return back()->withSuccess(__("admin/alert.default_success"));
        } catch (\Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()->withError(__("admin/alert.default_error"));
        }
    }
}
