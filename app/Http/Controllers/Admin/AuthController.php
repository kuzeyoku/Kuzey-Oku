<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Enums\StatusEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Requests\Auth\ForgotPasswordRequest;

class AuthController extends Controller
{
    protected $route;
    protected $folder;

    public function __construct()
    {
        $this->route = "auth";
        $this->folder = "auth";
        view()->share([
            "route" => $this->route,
            "folder" => $this->folder
        ]);
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
        if (Auth::attempt($request->only("email", "password"))) {
            $request->session()->regenerate();
            LogController::logger("info", "Giriş Yapıldı.");
            $message = [
                "title" => __("admin/{$this->folder}.login_success_title", ["name" => Auth::user()->name]),
                "message" => __("admin/{$this->folder}.login_success_message")
            ];
            return redirect()
                ->intended('admin')
                ->withSuccess($message);
        } else {
            RateLimiter::hit('login', (string) $request->ip());
            if (RateLimiter::tooManyAttempts('login', $request->ip(), 5)) {
                return back()->withError('Çok fazla giriş denemesi. Lütfen daha sonra tekrar deneyin.');
            }
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
        $token = request()->route("token");
        return view(themeView("admin", "{$this->folder}.reset_password"), compact("token"));
    }

    public function reset_password(Request $request)
    {
        $tokenData = DB::table("password_reset_tokens")->get();
        $email = null;
        foreach ($tokenData as $token) {
            if (Hash::check($request->token, $token->token)) {
                $email = $token->email;
                break;
            }
        }

        $status = Password::reset(
            array_merge($request->only("email", "password", "password_confirmation", "token"), ["email" => $email]),
            function (User $user, string $password) {
                $user->forceFill([
                    "password" => Hash::make($password)
                ])->save();
                $user->setRememberToken(Str::random(60));
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route("admin.{$this->route}.login")->withSuccess(__($status))
            : back()->withInput()->withError(__($status));
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
