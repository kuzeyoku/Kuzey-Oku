<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request)
    {
        if (!$this->recaptcha($request)) {
            return back()
                ->withInput()
                ->withError(__("front/contact.recaptcha_error"));
        }
        try {
            Newsletter::create(
                ["email" => $request->n_email]
            );
            return back()
                ->withSuccess(__("front/contact.newsletter_success"));
        } catch (\Exception $e) {
            return back()
                ->withError(__("front/contact.newsletter_error"));
        }
    }

    private function recaptcha($request)
    {
        if (config("setting.recaptcha.status") === StatusEnum::Active->value) {
            $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . config("setting.recaptcha.secret_key") . '&response=' . $request->{"g-recaptcha-response"});

            if (($recaptcha = json_decode($response)) && $recaptcha->success && $recaptcha->score >= 0.5) {
                return true;
            }

            return false;
        }

        return true;
    }
}
