<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        "url",
        "image",
        "title",
        "order",
        "status"
    ];

    public function scopeActive($query)
    {
        return $query->whereStatus(StatusEnum::Active->value);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy("order");
    }

    public function getImageUrlAttribute()
    {
        if ($this->image)
            return asset("storage/" . config("setting.image.folder", "image") . "/" . ModuleEnum::Brand->folder() . "/" . $this->image);
        return asset("assets/img/noimage.png");
    }

    public function getStatusViewAttribute()
    {
        $status = StatusEnum::getStatus($this->status);
        return $status->badge();
    }
}
