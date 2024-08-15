<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UserService extends BaseService
{
    protected $folder;
    protected $route;

    public function __construct(User $user)
    {
        parent::__construct($user, ModuleEnum::User);
    }
}
