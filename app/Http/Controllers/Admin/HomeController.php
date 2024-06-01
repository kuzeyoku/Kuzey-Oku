<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Blog;
use GuzzleHttp\Client;
use App\Models\Visitor;
use App\Models\Subscrib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;


class HomeController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->get("ipinfo.io/" . request()->ip() . "?token=1a17407b2ccf6f");
        $data["userData"] = json_decode($response->getBody());
        $errorLogsFile = storage_path('logs/custom_errors.log');
        $infoLogsFile = storage_path('logs/custom_info.log');
        if (File::exists($errorLogsFile)) {
            $data["errorLogs"] = array_reverse(array_filter(explode("\n", File::get($errorLogsFile)), function ($line) {
                return !empty($line);
            }));
        } else {
            $data["errorLogs"] = [];
        }
        if (File::exists($infoLogsFile)) {
            $data["infoLogs"] = array_reverse(array_filter(explode("\n", File::get($infoLogsFile)), function ($line) {
                return !empty($line);
            }));
        } else {
            $data["infoLogs"] = [];
        }
        $data["visits"] = Cache::remember("visits", 300, function () {
            return Visitor::all();
        });
        $data["subscrip"] = Cache::remember("subscrip", 300, function () {
            return Subscrib::count();
        });
        $data["popularPosts"] = Cache::remember("popularPosts", 300, function () {
            return Blog::orderBy("view_count", "desc")->limit(5)->get();
        });
        return view(themeView("admin", "index"), $data);
    }

    public function cacheClear()
    {
        Cache::flush();
        LogController::logger('info', __('admin/general.cache_clear_log'));
        return redirect()->back()->withSuccess(__('admin/general.cache_clear_success'));
    }

    public function logclean(Request $request)
    {
        $file = storage_path('logs/custom_' . $request->file . '.log');
        try {
            File::put($file, '');
            return redirect()->back()->withSuccess(__('admin/home.log_clean_success', ['file' => $request->file]));
        } catch (Exception $e) {
            return redirect()->back()->withError(__('admin/home.log_clean_error', ['file' => $request->file]));
        }
    }

    public function clearVisitorCounter()
    {
        try {
            Cache::forget("visits");
            Visitor::truncate();
            return back()->withSuccess(__('admin/home.visitor_counter_clear_success'));
        } catch (Exception $e) {
            return back()->withError(__('admin/home.visitor_counter_clear_error'));
        }
    }
}
