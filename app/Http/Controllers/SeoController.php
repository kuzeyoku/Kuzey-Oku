<?php

namespace App\Http\Controllers;
use Artesaos\SEOTools\Facades\SEOTools;

class SeoController extends Controller
{
    public static function set(object|array|null $item = null)
    {
        $themeAsset = \App\Services\ThemeService::getThemeAssets();
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        if (is_object($item)) {
            SEOTools::setTitle($item->title);
            SEOTools::setDescription($item->meta_description);
            SEOTools::opengraph()->addImage($themeAsset->cover);
            SEOTools::twitter()->setImage($themeAsset->cover);
        } elseif (is_array($item)) {
            SEOTools::setTitle($item["title"]);
            SEOTools::setDescription($item["description"]);
            SEOTools::opengraph()->addImage($themeAsset->cover);
            SEOTools::twitter()->setImage($themeAsset->cover);
        } else {
            SEOTools::setTitle(config("general.title", config("app.name")));
            SEOTools::setDescription(config("general.description"));
            SEOTools::opengraph()->addImage($themeAsset->cover);
            SEOTools::twitter()->setImage($themeAsset->cover);
        }
    }
}
