<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthService
{
    protected $guard = 'web';

    protected $socialDriver;

    /*
    * @param Request $request
    * @param mixed $events
    *
    * @return \Illuminate\Database\Eloquent\Model
    */
    public function register(Request $request, mixed ...$events): Model
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $user = $this->authModel()::create($data);

        foreach ($events as $events) {
            event(new $events($user));
        }

        return $user;
    }

    public function login(Request $request): bool
    {
        $credentials = $this->getCredentials($request);

        return auth($this->guard)->attempt($credentials, $request->has('remember'));
    }

    public function setSocialDriver(string $driver): self
    {
        $this->socialDriver = $driver;

        return $this;
    }

    public function socialRegister($driver = null, mixed ...$events): bool
    {
        if ($driver) {
            $this->socialDriver = $driver;
        }

        $this->register($this->socialUser(), ...$events);

        return $this->socialLogin();
    }

    public function socialLogin($driver = null): bool
    {
        if ($driver) {
            $this->socialDriver = $driver;
        }

        return $this->login($this->socialUser());
    }

    public function logout(): void
    {
        auth($this->guard)->logoutCurrentDevice();
    }

    public function setGuard(string $guard): self
    {
        $this->guard = $guard;

        return $this;
    }

    protected function authModel(): string
    {
        return auth($this->guard)->getProvider()->getModel();
    }

    protected function socialUser(): Request
    {
        $user = Socialite::driver($this->socialDriver)->stateless()->user();

        $user->email_verified_at = now();

        $user->password = 'social';

        if (isset($user->id)) {
            unset($user->id);
        }

        return new Request((array) $user);
    }

    protected function getCredentials(Request $request): array
    {
        $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $request->merge([$loginType => $request->email]);

        return $request->only($loginType, 'password');
    }
}
