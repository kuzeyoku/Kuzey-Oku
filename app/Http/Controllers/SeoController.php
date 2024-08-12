<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;

class SeoController extends Controller
{
    public static function set(object|array|null $item = null)
    {
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        if (is_object($item)) {
            SEOTools::setTitle($item->title);
            SEOTools::setDescription($item->meta_description);
            SEOTools::opengraph()->setTitle($item->title);
            SEOTools::opengraph()->setDescription($item->meta_description);
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::twitter()->setTitle($item->title);
            SEOTools::jsonLd()->setTitle($item->title);
            SEOTools::jsonLd()->setDescription($item->meta_description);
        } elseif (is_array($item)) {
            SEOTools::setTitle($item["title"]);
            SEOTools::setDescription($item["description"]);
            SEOTools::opengraph()->setTitle($item["title"]);
            SEOTools::opengraph()->setDescription($item["description"]);
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::twitter()->setTitle($item["title"]);
            SEOTools::jsonLd()->setTitle($item["title"]);
            SEOTools::jsonLd()->setDescription($item["description"]);
        } else {
            SEOTools::setTitle(settings("general.title", config("app.name")));
            SEOTools::setDescription(settings("general.description"));
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
