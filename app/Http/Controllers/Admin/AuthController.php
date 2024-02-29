<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{

    protected $route;
    protected $folder;

    public function __construct()
    {
        $this->route = "auth";
        $this->folder = "auth";
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }
        return view(themeView("admin", "{$this->folder}.login"));
    }

    public function authenticate(LoginRequest $request)
    {
        if (!$this->recaptcha($request)) {
            return back()
                ->withInput()
                ->withError(__("admin/{$this->folder}.recaptcha_error"));
        }

        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            LogController::logger("info", "Giriş Yapıldı.");
            $message = [
                "title" => __("admin/{$this->folder}.login_success_title", ["name" => Auth::user()->name]),
                "message" => __("admin/{$this->folder}.login_success_message")
            ];
            return redirect()
                ->intended('admin')
                ->withSuccess($message);
        }
        LogController::logger("error", "Başarısız Giriş Denemesi - IP: " . $request->ip() . " - Email: " . $request->email);
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.login_error"));
    }

    public function forgot_password_view()
    {
        return view(themeView("admin", "{$this->folder}.forgot_password"));
    }

    public function forgot_password(ForgotPasswordRequest $request)
    {
        if (!$this->recaptcha($request)) {
            return back()
                ->withInput()
                ->withError(__("admin/{$this->folder}.recaptcha_error"));
        }
        $status = Password::sendResetLink($request->only("email"));
        return $status === Password::RESET_LINK_SENT ? redirect()->route("admin.auth.login")->withSuccess(__($status)) : back()->withInput()->withError(__($status));
    }

    public function reset_password_view()
    {
        return view(themeView("admin", "{$this->folder}.reset_password"));
    }

    public function reset_password(Request $request)
    {

    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect()
            ->route("admin.{$this->route}.login")
            ->withSuccess(__("admin/{$this->folder}.logout_success"));
    }

    protected function recaptcha($request)
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
