<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function doRegister(RegisterRequest $request): RedirectResponse
    {
        $this->auth->register($request, Registered::class);

        $this->auth->login($request);

        return redirect(route('verification.notice'));
    }

    public function doLogin(Request $request): RedirectResponse
    {
        if ($this->auth->login($request)) {
            return redirect(route('home'));
        }

        return redirect(route('login'))->withErrors(['password' => 'Email or password is incorrect']);
    }

    public function logout(): RedirectResponse
    {
        $this->auth->logout();

        return redirect(route('home'));
    }

    public function socialRedirect($driver): RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function socialAuth($driver): bool
    {
        return $this->auth->socialRegister($driver);
    }

    public function verifyNotice(): View
    {
        return view('verification.notice');
    }

    public function verifyResend(Request $request): RedirectResponse
    {
        $request->user('web')->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')->with('status', 'verification-link-sent');
    }

    public function verify(Request $request): RedirectResponse
    {
        $request->user('web')->markEmailAsVerified();

        return redirect(route('user.profile'));
    }
}
