<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Message;
use Illuminate\Support\Facades\View;
use App\Services\Admin\MessageService;
use App\Services\Admin\NotificationService;
use App\Http\Requests\Message\ReplyMessageRequest;

class MessageController extends Controller
{

    public function __construct(private MessageService $service)
    {
        View::share([
            "route" => $service->route(),
            "folder" => $service->folder()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->folder()}.index"), compact("items"));
    }

    public function show(Message $message)
    {
        $this->service->messageRead($message);
        return view(themeView("admin", "{$this->service->folder()}.show"), compact("message"));
    }

    public function reply(Message $message)
    {
        return view(themeView("admin", "{$this->service->folder()}.reply"), compact("message"));
    }

    public function sendReply(ReplyMessageRequest $request, Message $message)
    {
        try {
            $this->service->sendReply($request, $message);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()
                ->withError(__("admin/alert.default_error"));
        }
    }

    public function destroy(Message $message)
    {
        try {
            $this->service->delete($message);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/alert.default_success"));
        } catch (Throwable $e) {
            return back()
                ->withError(__("admin/alert.default_error"));
        }
    }
}
