<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion("thumbnail")
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    protected $fillable = [
        "status",
        "order",
        "slug",
        "category_id",
    ];

    protected $locale;

    protected $with = ["translate", "category"];

    public function __construct()
    {
        parent::__construct();
        $this->locale = session()->get("locale");
    }


    public function scopeActive($query)
    {
        return $query->whereStatus(StatusEnum::Active->value);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy("order");
    }

    public function translate()
    {
        return $this->hasMany(ServiceTranslate::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTitlesAttribute()
    {
        return $this->translate->pluck("title", "lang")->all();
    }

    public function getTitleAttribute()
    {
        return $this->translate->where("lang", $this->locale)->pluck("title")->first();
    }

    public function getDescriptionsAttribute()
    {
        return $this->translate->pluck("description", "lang")->all();
    }

    public function getDescriptionAttribute()
    {
        return $this->translate->where("lang", $this->locale)->pluck("description")->first();
    }

    public function getShortDescriptionAttribute()
    {
        return Str::limit(strip_tags($this->description), 100);
    }

    public function getUrlAttribute()
    {
        return route(ModuleEnum::Service->route() . ".show", [$this, $this->slug]);
    }

    public function getImageUrlAttribute()
    {
        if (is_null($this->image))
            return asset("assets/img/noimage.png");
        return asset("storage/" . config("setting.image.folder", "image") . "/" . ModuleEnum::Service->folder() . "/" . $this->image);
    }

    public function getOtherAttribute()
    {
        return Service::active()->where("id", "!=", $this->id)->limit(5)->get();
    }

    public function getStatusViewAttribute()
    {
        $status = StatusEnum::getStatus($this->status);
        return $status->badge();
    }
}
