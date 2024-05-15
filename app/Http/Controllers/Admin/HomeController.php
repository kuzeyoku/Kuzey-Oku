<?php

namespace App\Http\Controllers\Admin;

use Exception;
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
        $data["subscrip"] = Subscrib::count();
        return view(themeView("admin", "index"), $data);
    }

    public function cacheClear()
    {
        Cache::flush();
        LogController::logger('info', __('admin/general.cache_clear_log'));
        return redirect()->route("admin.index")->withSuccess(__('admin/general.cache_clear_success'));
    }

    public function logclean(Request $request)
    {
        $file = storage_path('logs/custom_' . $request->file . '.log');
        if (File::exists($file)) {
            File::delete($file);
            return redirect()->back()->withSuccess(__('admin/general.log_clean_success', ['file' => $request->file]));
        } else {
            return redirect()->back()->withError(__('admin/general.log_clean_error', ['file' => $request->file]));
        }
    }

    public function clearVisitorCounter()
    {
        try {
            Cache::forget("visits");
            Visitor::truncate();
            return back()->withSuccess("Tüm Ziyaretçi Kayıtları Başarıyla Temizlendi");
        } catch (Exception $e) {
            return back()->withError("Bir Hata Oluştu");
        }
    }
}
