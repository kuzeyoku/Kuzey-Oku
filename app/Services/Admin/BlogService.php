<?php

namespace App\Services\Admin;

use App\Models\Blog;
use App\Enums\ModuleEnum;

class BlogService extends BaseService
{
    protected $blog;

    public function __construct(Blog $blog)
    {
        parent::__construct($blog, ModuleEnum::Blog);
    }
}
