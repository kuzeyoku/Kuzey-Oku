<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\Visitor;
use App\Models\BlogComment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;


class HomeController extends Controller
{
    public function index()
    {
        $errorLogsFile = storage_path('logs/custom_errors.log');
        $infoLogsFile = storage_path('logs/custom_info.log');
        if (File::exists($errorLogsFile)) {
            $errorLogs = array_filter(explode("\n", File::get($errorLogsFile)), function ($line) {
                return !empty($line);
            });
        } else {
            $errorLogs = [];
        }
        if (File::exists($infoLogsFile)) {
            $infoLogs = array_filter(explode("\n", File::get($infoLogsFile)), function ($line) {
                return !empty($line);
            });
        } else {
            $infoLogs = [];
        }
        $messages = Message::unread()->count();
        $comments = BlogComment::pending()->count();
        $visits = Cache::remember("visits", 300, function () {
            return Visitor::all();
        });
        return view('admin.index', compact('messages', "comments", 'errorLogs', 'infoLogs', "visits"));
    }

    public function cacheClear()
    {
        Cache::flush();
        LogController::logger('info', __('admin/general.cache_clear_log'));
        return redirect()->back()->with('success', __('admin/general.cache_clear_success'));
    }

    public function logclean(Request $request)
    {
        $file = storage_path('logs/custom_' . $request->file . '.log');
        if (File::exists($file)) {
            File::delete($file);
            return redirect()->back()->with('success', __('admin/general.log_clean_success', ['file' => $request->file]));
        } else {
            return redirect()->back()->with('error', __('admin/general.log_clean_error', ['file' => $request->file]));
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
