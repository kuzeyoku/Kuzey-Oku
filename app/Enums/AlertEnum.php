<?php

namespace App\Enums;

enum AlertEnum: string
{

    public function __construct(ModuleEnum $module)
    {
        $this->module = $module;
    }

    case CreatedSuccess = "created_success";
    case CreatedError = "created_error";
    case UpdatedSuccess = "updated_success";
    case UpdatedError = "updated_error";
    case DeletedSuccess = "deleted_success";
    case DeletedError = "deleted_error";
    case CreatedLog = "created_log";
    case UpdatedLog = "updated_log";
    case DeletedLog = "deleted_log";

    public function message($title = null): string
    {
        return match ($this) {
            self::CreatedSuccess => __("admin/alert.created_success", ["module" => $this->module->singleTitle()]),
            self::CreatedError => __("admin/alert.created_error", ["module" => $this->module->singleTitle()]),
            self::UpdatedSuccess => __("admin/alert.updated_success", ["module" => $this->module->singleTitle()]),
            self::UpdatedError => __("admin/alert.updated_error", ["module" => $this->module->singleTitle()]),
            self::DeletedSuccess => __("admin/alert.deleted_success", ["module" => $this->module->singleTitle()]),
            self::DeletedError => __("admin/alert.deleted_error", ["module" => $this->module->singleTitle()]),
            self::CreatedLog => __("admin/alert.created_log", ["module" => $this->module->singleTitle(), "title" => $title]),
            self::UpdatedLog => __("admin/alert.updated_log", ["module" => $this->module->singleTitle(), "title" => $title]),
            self::DeletedLog => __("admin/alert.deleted_log", ["module" => $this->module->singleTitle(), "title" => $title]),
        };
    }
}
