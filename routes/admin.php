<?php

use App\Enums\ModuleEnum;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Artisan;

Route::prefix('admin')->name('admin.')->group(function () {

    // Route::get("/storage-link", function () {
    //     Artisan::call("storage:link");
    //     return back()->with("success", "Storage Link Successfull");
    // })->name("storage-link");

    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('auth.login');
    Route::get("forgot-password", [App\Http\Controllers\Admin\AuthController::class, "forgot_password_view"])->name("auth.forgot_password_view");
    Route::post('forgot-password', [App\Http\Controllers\Admin\AuthController::class, "forgot_password"])->name("auth.forgot_password");
    Route::get('reset-password/{token}', [App\Http\Controllers\Admin\AuthController::class, "reset_password_view"])->name("auth.reset_password_view");
    Route::post("reset-password", [App\Http\Controllers\Admin\AuthController::class, "reset_password"])->name("auth.reset_password");
    Route::post('authenticate', [App\Http\Controllers\Admin\AuthController::class, 'authenticate'])->name('auth.authenticate');

    Route::middleware(['auth'])->group(function () {

        Route::get('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('auth.logout');

        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');

        Route::controller(App\Http\Controllers\Admin\SettingController::class)->prefix('setting')->group(function () {
            Route::get('/', 'index')->name('setting');
            Route::put('/update', 'update')->name('setting.update');
        });

        Route::post("editor/upload", [App\Http\Controllers\Admin\EditorController::class, "store"])->name("editor.upload");
        Route::get("cache-clear", [App\Http\Controllers\Admin\HomeController::class, "cacheClear"])->name("cache-clear");
        Route::post("log-clean", [App\Http\Controllers\Admin\HomeController::class, "logClean"])->name("logclean");
        Route::post("clear-visitor-counter", [App\Http\Controllers\Admin\HomeController::class, "clearVisitorCounter"])->name("clearvisitorcounter");
        Route::get("update-visitor-counter", function () {
            \Illuminate\Support\Facades\Cache::forget("visits");
            return back()->withSuccess("Ziyaretçi Kayıtları Güncellendi");
        })->name("updatevisitorcounter");

        Route::controller(App\Http\Controllers\Admin\LanguageController::class)->prefix("language")->group(function () {
            Route::match(["get", "post"], "/{language}/files", "files")->name("language.files");
            Route::post("/{language}/getFileContent", "getFileContent")->name("language.getFileContent");
            Route::put("/{language}/updateFileContent", "updateFileContent")->name("language.updateFileContent");
        });

        if (ModuleEnum::Menu->status())
            Route::controller(App\Http\Controllers\Admin\MenuController::class)->prefix('menu')->group(function () {
                Route::get('/header', 'header')->name('menu.header');
                Route::get('/footer', 'footer')->name('menu.footer');
            });

        if (ModuleEnum::Message->status())
            Route::controller(App\Http\Controllers\Admin\MessageController::class)->prefix("message")->group(function () {
                Route::get("/", "index")->name(ModuleEnum::Message->route() . ".index");
                Route::get("/{message}/show", "show")->name(ModuleEnum::Message->route() . ".show");
                Route::get("/{message}/reply", "reply")->name(ModuleEnum::Message->route() . ".reply");
                Route::post("/{message}/sendReply", "sendReply")->name(ModuleEnum::Message->route() . ".sendReply");
                Route::delete("/{message}/destroy", "destroy")->name(ModuleEnum::Message->route() . ".destroy");
            });

        if (ModuleEnum::Product->status())
            Route::controller(App\Http\Controllers\Admin\ProductController::class)->prefix("product")->group(function () {
                Route::get("/{product}/image", "image")->name(ModuleEnum::Product->route() . ".image");
                Route::post("/imageStore", "imageStore")->name(ModuleEnum::Product->route() . ".imageStore");
                Route::delete("/{image}/imagedelete", "imageDelete")->name(ModuleEnum::Product->route() . ".imageDelete");
                Route::delete("/{product}/imagealldelete", "imageAllDelete")->name(ModuleEnum::Product->route() . ".imageAllDelete");
            });

        if (ModuleEnum::Project->status())
            Route::controller(App\Http\Controllers\Admin\ProjectController::class)->prefix("project")->group(function () {
                Route::get("/{project}/image", "image")->name(ModuleEnum::Project->route() . ".image");
                Route::post("/imageStore", "imageStore")->name(ModuleEnum::Project->route() . ".imageStore");
                Route::delete("/{image}/imageDelete", "imageDelete")->name(ModuleEnum::Project->route() . ".imageDelete");
                Route::delete("/{project}/imageAllDelete", "imageAllDelete")->name(ModuleEnum::Project->route() . ".imageAllDelete");
            });

        if (ModuleEnum::Blog->status())
            Route::controller(App\Http\Controllers\Admin\BlogController::class)->prefix("blog")->group(function () {
                Route::get("/comments", "comments")->name(ModuleEnum::Blog->route() . ".comments");
                Route::put("/comment/{comment}/approve", "comment_approve")->name(ModuleEnum::Blog->route() . ".comment_approve");
                Route::delete("/comment/{comment}/delete", "comment_delete")->name(ModuleEnum::Blog->route() . ".comment_delete");
            });

        foreach (App\Enums\ModuleEnum::cases() as $module) {
            if ($module->status())
                Route::resource($module->route(), $module->controller())->names($module->route());
        }
    });
});
