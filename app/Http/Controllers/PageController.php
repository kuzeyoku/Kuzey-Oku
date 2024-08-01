<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Artesaos\SEOTools\Facades\SEOTools;


class PageController extends Controller
{
    public function show(Page $page)
    {
        SeoController::set($page);
        return view('page', compact('page'));
    }
}
