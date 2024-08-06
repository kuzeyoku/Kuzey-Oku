<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AlertEnum;
use Throwable;
use App\Models\Blog;
use App\Enums\StatusEnum;
use Illuminate\Support\Facades\View;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Services\Admin\BlogService;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;

class BlogController extends Controller
{
    protected $service;
    protected $alert;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
        $this->alert = new AlertEnum($this->service->module());
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
            LogController::logger("info", $this->alert->CreatedLog->message($request->title[app()->getFallbackLocale()]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->alert->CreatedSuccess->message());
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError($this->alert->CreatedError->message());
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
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $blog->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(AlertEnum::UpdatedSuccess->getMessage($this->service->module()));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(AlertEnum::UpdatedError->getMessage($this->service->module()));
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

    public function destroy(Blog $blog)
    {
        try {
            LogController::logger("info", AlertEnum::DeletedLog->getMessage($this->service->module(), $blog->title));
            $this->service->delete($blog);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(AlertEnum::DeletedSuccess->getMessage($this->service->module()));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(AlertEnum::DeletedError->getMessage($this->service->module()));
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
            LogController::logger("info", __("admin/{$this->service->folder()}.comment_approve_log"));
            $comment->status = StatusEnum::Active->value;
            $comment->save();
            return back()->withSuccess(__("admin/{$this->service->folder()}.comment_approve_success"));
        } catch (\Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()->withError(__("admin/{$this->service->folder()}.comment_approve_error"));
        }
    }

    public function comment_disapprove(BlogComment $comment)
    {
        try {
            LogController::logger("info", __("admin/{$this->service->folder()}.comment_disapprove_log"));
            $comment->status = StatusEnum::Passive->value;
            $comment->save();
            return back()->withSuccess(__("admin/{$this->service->folder()}.comment_disapprove_success"));
        } catch (\Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()->withError(__("admin/{$this->service->folder()}.comment_disapprove_error"));
        }
    }

    public function comment_delete(BlogComment $comment)
    {
        try {
            LogController::logger("info", __("admin/{$this->service->folder()}.comment_delete_log"));
            $comment->delete();
            return back()->withSuccess(__("admin/{$this->service->folder()}.comment_delete_success"));
        } catch (\Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()->withError(__("admin/{$this->service->folder()}.comment_delete_error"));
        }
    }
}
