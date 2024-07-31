<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function set($item = null)
    {
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        if ($item) {
            SEOTools::setTitle($item->title);
            SEOTools::setDescription($item->short_description);
            SEOTools::opengraph()->setTitle($item->title);
            SEOTools::opengraph()->setDescription($item->short_description);
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::twitter()->setTitle($item->title);
            SEOTools::jsonLd()->setTitle($item->title);
            SEOTools::jsonLd()->setDescription($item->short_description);
        } else {
            SEOTools::setTitle(settings("settings.title", config("app.name")));
            SEOTools::setDescription(settings("settings.description"));
            SEOTools::setKeywords(settings("settings.keywords"));
            SEOTools::opengraph()->setTitle(settings("general.title", config("app.name")));
            SEOTools::opengraph()->setSiteName(settings("general.title", config("app.name")));
            SEOTools::opengraph()->setDescription(settings("general.description"));
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::twitter()->setTitle(settings("general.title", config("app.name")));
            SEOTools::jsonLd()->setTitle(settings("general.title", config("app.name")));
            SEOTools::jsonLd()->setDescription(settings("general.description"));
            SEOTools::jsonLd()->addImage(settings("general.image"));
        }
    }
}
