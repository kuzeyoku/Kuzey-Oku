<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Blog;
use App\Enums\StatusEnum;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Services\Admin\BlogService;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;

class BlogController extends Controller
{
    protected $service;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
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
            $this->service->create($request->validated());
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withError(__("admin/alert.default_error"));
        }
    }

    public function edit(Blog $blog)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact("blog"));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        try {
            $this->service->update($request->validated(), $blog);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withError(__("admin/alert.default_error"));
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

    public function destroy(Blog $blog)
    {
        try {
            $this->service->delete($blog);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()
                ->withError(__("admin/alert.default_error"));
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
            return back()->withError(__("admin/alert.default_error"));
        }
    }

    public function comment_delete(BlogComment $comment)
    {
        try {
            $comment->delete();
            return back()->withSuccess(__("admin/alert.default_success"));
        } catch (\Exception $e) {
            return back()->withError(__("admin/alert.default_error"));
        }
    }
}
