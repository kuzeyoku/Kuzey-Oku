<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Artesaos\SEOTools\Facades\SEOTools;


class PageController extends Controller
{
    public function show(Page $page)
    {
        SEOTools::setTitle($page->title);
        SEOTools::setDescription($page->short_description);
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->setTitle($page->title);
        SEOTools::opengraph()->setSiteName(settings("general.title", config("app.name")));
        SEOTools::opengraph()->setDescription($page->short_description);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setTitle($page->title);
        SEOTools::jsonLd()->setTitle($page->title);
        SEOTools::jsonLd()->setDescription($page->short_description);
        return view('page', compact('page'));
    }
}
