<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        SeoController::set();
        $service = Service::active()->order()->get();
        return view("service.index", compact("service"));
    }

    public function show(Service $service)
    {
        SeoController::set($service);
        $otherServices = Service::whereKeyNot($service->id)->get();
        return view("service.show", compact("service", "otherServices"));
    }
}
