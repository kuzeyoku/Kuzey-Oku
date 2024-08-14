<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Reference;

class ReferenceService extends BaseService
{
    protected $reference;

    public function __construct(Reference $reference)
    {
        parent::__construct($reference, ModuleEnum::Reference);
    }
}
