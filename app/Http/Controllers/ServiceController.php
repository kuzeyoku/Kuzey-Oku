<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::active()->order()->get();
        return view("service.index", compact("service"));
    }

    public function show(Service $service)
    {
        return view("service.show", compact("service"));
    }
}
