<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $date = Carbon::parse(config("setting.maintenance.end_date"))->format("m.d.Y");
        return view("maintenance", compact("date"));
    }
}
