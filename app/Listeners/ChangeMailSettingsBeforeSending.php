<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSending;

class ChangeMailSettingsBeforeSending
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageSending $event): void
    {
        config(["mail.mailers.smtp.host" => settings("smtp.host", env("MAIL_HOST"))]);
        config(["mail.mailers.smtp.port" => settings("smtp.port", env("MAIL_PORT"))]);
        config(["mail.mailers.smtp.username" => settings("smtp.username", env("MAIL_USERNAME"))]);
        config(["mail.mailers.smtp.password" => settings("smtp.password", env("MAIL_PASSWORD"))]);
        config(["mail.mailers.smtp.encryption" => settings("smtp.encryption", env("MAIL_ENCRYPTION"))]);
        config(["mail.mailers.smtp.from.address" => settings("smtp.from_address", env("MAIL_FROM_ADDRESS"))]);
        config(["mail.mailers.smtp.from.name" => settings("smtp.from_name", env("MAIL_FROM_NAME"))]);
        config(["mail.mailers.smtp.reply_to.address" => settings("smtp.reply_address", env("MAIL_REPLY_ADDRESS"))]);
    }
}
