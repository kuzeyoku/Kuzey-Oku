<?php

namespace App\Http\Requests\Blog;

use App\Enums\ModuleEnum;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected $folder;

    public function __construct()
    {
        $this->folder = ModuleEnum::Blog->folder();
    }

    public function rules(): array
    {
        return [
            "title." . app()->getLocale() => "required",
            "title.*" => "",
            "description.*" => "",
            "tags.*" => "",
            "order" => "required|numeric|min:0",
            "status" => "required",
            "category_id" => "",
        ];
    }

    public function attributes(): array
    {
        return [
            "title." . app()->getLocale() => __("admin/{$this->folder}.form.title"),
            "description.*" => __("admin/{$this->folder}.form.description"),
            "tags.*" => __("admin/{$this->folder}.form.tags"),
            "category_id" => __("admin/{$this->folder}.form.category"),
            "image" => __("admin/{$this->folder}.form.image"),
            "order" => __("admin/general.order"),
            "status" => __("admin/general.status")
        ];
    }
}
