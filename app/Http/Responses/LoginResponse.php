<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();

        $home = $user->isAdmin() ? route('admin.dashboard') : route('dashboard');

        return redirect()->intended($home);
    }
}
