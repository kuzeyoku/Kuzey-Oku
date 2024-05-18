<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaService extends BaseService

{
    protected $media;

    public function __construct(Media $media)
    {
        parent::__construct($media, ModuleEnum::Media);
    }
}
