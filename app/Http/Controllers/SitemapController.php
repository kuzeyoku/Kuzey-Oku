<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Enums\StatusEnum;

class SitemapController extends Controller
{
    public function index()
    {
        $pages = Page::active()->get();
        $posts = Blog::active()->get();
        $categories = Category::active()->get();
        $services = Service::active()->get();
        $projects = Project::active()->get();
        $view = view("sitemap", compact("pages", "posts", "categories", "services", "projects"))->render();
        return response($view)->header("Content-Type", "text/xml");
    }
}
