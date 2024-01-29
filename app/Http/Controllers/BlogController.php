<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    protected $cacheTime;
    protected $folder;

    public function __construct()
    {
        $this->cacheTime = config("settings.caching.time", 3600);
        $this->folder = ModuleEnum::Blog->folder();
    }
    public function index()
    {

        $currentpage = Paginator::resolveCurrentPage() ?: 1;
        $pagination = config("setting.pagination.front", 10);

        $cacheKey = ModuleEnum::Blog->value . "_" . $currentpage . "_" . app()->getLocale();

        if (config("setting.caching.status", false)) {
            $data = Cache::remember($cacheKey, config("setting.caching.time", 3600), function () use ($pagination) {
                return [
                    "posts" => Blog::active()->order()->paginate($pagination),
                    "popularPost" => Blog::active()->viewOrder()->take(5)->get(),
                    "categories" => Category::active()->whereModule(ModuleEnum::Blog->value)->get(),
                ];
            });
        } else {
            $data = [
                "posts" => Blog::active()->order()->paginate($pagination),
                "popularPost" => Blog::active()->viewOrder()->take(5)->get(),
                "categories" => Category::active()->whereModule(ModuleEnum::Blog->value)->get(),
            ];
        }

        return view("$this->folder.index", $data);
    }

    public function show(Blog $post)
    {
        $cacheKey = ModuleEnum::Blog->value . "_" . $post->id . "_" . app()->getLocale();
        $post->increment("view_count");
        if (config("setting.caching.status", false)) {
            $data = Cache::remember($cacheKey, config("setting.caching.time", 3600), function () use ($post) {
                return [
                    "post" => $post,
                    "popularPost" => Blog::active()->viewOrder()->take(5)->get(),
                    "categories" => Category::active()->whereModule(ModuleEnum::Blog->value)->get(),
                ];
            });
        } else {
            $data = [
                "post" => $post,
                "popularPost" => Blog::active()->viewOrder()->take(5)->get(),
                "categories" => Category::active()->whereModule(ModuleEnum::Blog->value)->get(),
            ];
        }
        return view("$this->folder.show", $data);
    }

    public function comment_store(Request $request, Blog $post)
    {
        try {
            BlogComment::create([
                "post_id" => $post->id,
                "name" => $request->name,
                "email" => $request->email,
                "comment" => $request->comment,
                "ip" => $request->ip(),
                "status" => StatusEnum::Pending->value,
            ]);
            return back()->withSuccess("Yorum Başarıyla Eklendi Moderatör Onayı Sonrası Yayınlanacaktır.");
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withInput()->withError("Yorum Eklenirken Bir Hata Meydana Geldi");
        }
    }
}
