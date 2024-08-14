<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Services\Admin\ProductService;
use App\Http\Requests\Product\ImageProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    protected $service;
    protected $notification;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
        View::share([
            "categories" => $this->service->getCategories(),
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "module" => $this->service->module()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->folder()}.index"), compact('items'));
    }

    public function show(Product $product)
    {
        return view(themeView("admin", "{$this->service->folder()}.show"), compact('product'));
    }

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $this->service->create($request->validated());
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("created_success"));
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withError($this->notification->alert("created_error"));
        }
    }

    public function edit(Product $product)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact("product"));
    }

    public function image(Product $product)
    {
        return view(themeView("admin", "layout.image"), ["item" => $product]);
    }

    public function imageStore(ImageProductRequest $request, Product $product): object
    {
        if ($this->service->imageUpload($request, $product)) {
            return (object) [
                "message" => __("admin/alert.default_success")
            ];
        } else {
            return (object) [
                "message" => __("admin/alert.default_error")
            ];
        }
    }

    public function imageDelete(Media $image)
    {
        try {
            $this->service->imageDelete($image);
            return back()
                ->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()
                ->withError(__("admin/alert.default_error"));
        }
    }

    public function imageAllDelete(Product $product)
    {
        try {
            $this->service->imageAllDelete($product);
            return back()
                ->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()
                ->withError(__("admin/alert.default_error"));
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $this->service->update($request->validated(), $product);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("updated_success"));
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withError($this->notification->alert("updated_error"));
        }
    }

    public function statusUpdate(Request $request, int $page)
    {
        $request->validate(["status" => "required"]);
        try {
            $this->service->statusUpdate($request, $page);
            return back();
        } catch (Throwable $e) {
            return back()
                ->withError(__("admin/alert.default_error"));
        }
    }

    public function destroy(Product $product)
    {
        try {
            $this->service->delete($product);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess($this->notification->alert("deleted_success"));
        } catch (Throwable $e) {
            return back()
                ->withError($this->notification->alert("deleted_error"));
        }
    }
}
