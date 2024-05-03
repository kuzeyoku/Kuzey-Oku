<?php

namespace App\Services\Admin;

use App\Models\Message;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use App\Mail\Admin\ReplyMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class MessageService extends BaseService
{
    public function __construct(Message $message)
    {
        parent::__construct($message, ModuleEnum::Message);
    }

    public function statusUpdate(Model $message)
    {
        $message->status = StatusEnum::Read->value;
        return $message->save();
    }

    public function sendReply($request, Model $message)
    {
        try {
            Mail::to($message->email)->send(new ReplyMessage($request, $message));
            $message->status = StatusEnum::Answered->value;
            return $message->save();
        } catch (\Exception $e) {
            Log::channel('custom_errors')->error($e->getMessage());
        }
    }
}
